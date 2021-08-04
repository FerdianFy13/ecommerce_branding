<?php

namespace App\Http\Controllers;

use Cart;
use App\Coupon;
use App\Product;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function index(){
        return view('cart');
    }
    public function removeAllItems(){
        if(Cart::isEmpty()){
            return redirect('/cart');
        }
        Cart::clear();
        notify()->success('Removed all items');
        return back();
    }
    public function updateItems(Request $request){
        
        $custom_errors=collect([]);
        for($i=0;$i<count($request->id);$i++){
            $product=Product::find($request->id[$i]);

            $product_stock= $product->quantity-$request->qty[$i];

            if($product_stock<0){
                $custom_error='You cannot add that amount. '.$product->title.' has '.$product->quantity.' items left';
                $custom_errors->push($custom_error);
            }
            else{
                Cart::update($request->id[$i], array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->qty[$i]
                    ),
                ));
            }
            
        }
        
        if(count($custom_errors)!=0){
            session()->flash('custom_errors',$custom_errors);
        }
        else{
            notify()->success('Updated successfully');
        }
        return response()->json('updated');
    }

    public function addDiscount(Request $request){
        $request->validate([
            'discount'=>'required'
        ]);

        
        $coupon=Coupon::where('code',$request->discount)->where('status','active')->first();

        if(!$coupon){
            notify()->error('Invalid coupon');
            return back();
        }
        Cart::removeConditionsByType('coupon');
        
        if($coupon->type=='fixed'){
            $amount=$coupon->amount;
        }
        else{
            $amount=($coupon->amount).'%';
        }
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $coupon->code,
            'type' => 'coupon',
            'target' => 'subtotal', // this condition will be applied to cart's total when getTotal() is called.
            'value' => '-'.$amount,
        ));
        Cart::condition($condition);
        notify()->success('Coupon added');
        return back();
           
    }

    public function discountRemove(){
        Cart::removeConditionsByType('coupon');
        notify()->success('Coupon removed');
        return back();
    }
    public function rowItemRemove($rowId){
        Cart::remove($rowId);
        notify()->success('Item removed');
        return back();
    }
}

