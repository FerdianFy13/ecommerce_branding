<?php

namespace App\Http\Controllers;

use Cart;
use App\Review;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductPageController extends Controller
{
    public function index($slug){
        $product=Product::where('slug',$slug)->firstorfail();
        $reviews=Review::where('product_id',$product->id)->latest()->paginate(5);
        $products=Product::inRandomOrder()->where('slug','!=',$slug)->take(3)->get();


        return view('product',compact('product','reviews','products'));
    }
    public function addToCart(Request $request){
        
        $validator=Validator::make($request->all(),[
            'quantity'=>'numeric|min:1'
        ]);

        if($validator->fails()){
            notify()->error('Minimum add quantity is 1');
            return back();
        }

        $id=$request->id;
        $qty=$request->quantity;

        $product=Product::find($id);

        $product_stock= $product->quantity-$qty;

        if($product_stock<0){
            notify()->error('You cannot add that amount. Only '.$product->quantity.' items left');
            return back();
        }

        if($product->discounted_price>0){
            $discount=$product->regular_price-$product->discounted_price;
            $itemCondition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $product->title.' discount',
                'type' => 'product discount',
                'value' => '-'.$discount,
            ));
            Cart::add(array(
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
            Cart::add(array(
                array(
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->regular_price,
                    'quantity' => $qty,
                    'associatedModel' => 'App\Product',
                ), 
            ));
        }

        //add conditions
        $this->addConditions();
        
        notify()->success('Product added');
        return back();
    }

    public function addReview(Request $request){
        $request->validate([
            'rating'=>'required',
            'review'=>'required'
        ]);

        Review::create([
            'product_id'=>$request->product_id,
            'user_id'=>$request->user_id,
            'rating'=>$request->rating,
            'description'=>$request->review,
        ]);

        notify()->success('Review added');
        return back();
    }

    public function getProducts(Request $request){ //prodcut search

        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("products")
                    ->select("id","title")
                    ->where('title','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
    }

    protected function addConditions(){

        if(is_null(setting('shop.vat'))){
            $vat=0;
        }
        else{
            $vat=setting('shop.vat');
        }
        if(is_null(setting('shop.shipping'))){
            $shipping=0;
        }
        else{
            $shipping=setting('shop.shipping');
        }

        $condition1 = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT',
            'type' => 'vat',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => $vat.'%',
            
        )); 
        $condition2 = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'Shipping',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => $shipping,
            
        ));

        Cart::condition([$condition1,$condition2]); 

    }

}
