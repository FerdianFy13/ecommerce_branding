<?php

namespace App\Http\Livewire\VoyagerOrders;

use App\Product;
use Livewire\Component;

class OrderEdit extends Component
{
    public $bread_id;
    public $product;
    public $quantity;
    
    protected $listeners = ['selectProduct'];

    public function selectProduct($product_id)
    {
        $this->product=$product_id;
    }
    
    public function mount($bread_id)
    {
        $this->bread_id = $bread_id;
    }

    public function deselect()
    {
        $this->product='';
        $this->quantity='';
    }
    public function removeProduct($id)
    {
        \Cart::session('backend')->remove($id);
    }
    public function addProduct()
    {
        
        $this->validate([
            'product' => 'required',
            'quantity' => 'required',
        ]);

        // Execution doesn't reach here if validation fails.

        $id=$this->product;
        $qty=$this->quantity;

        $product=Product::find($id);

        $product_stock= $product->quantity-$qty;

        if($product_stock<0){
            $this->addError('product','You cannot add that amount. Only '.$product->quantity.' items left');
        }

        if($product->discounted_price>0){
            $discount=$product->regular_price-$product->discounted_price;
            $itemCondition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $product->title.' discount',
                'type' => 'product discount',
                'value' => '-'.$discount,
            ));
            \Cart::session('backend')->add(array(
                array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->regular_price,
                    'quantity' => $qty,
                    'associatedModel' => 'App\Product',
                    'conditions' => [$itemCondition]
                ), 
            ));
        }
        else{
            \Cart::session('backend')->add(array(
                array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->regular_price,
                    'quantity' => $qty,
                    'associatedModel' => 'App\Product',
                ), 
            ));
        }

        $this->deselect();
    }


    public function render()
    {
        return view('livewire.voyager-orders.order-edit');
    }
}
