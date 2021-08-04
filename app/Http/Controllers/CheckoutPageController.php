<?php

namespace App\Http\Controllers;

use Cart;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Countries\Package\Countries;

class CheckoutPageController extends Controller
{
    public function index(){
        if(Cart::isEmpty()){
            return redirect('/cart');
        }

        if(Auth::user()){
            $customer=Customer::where('user_id',Auth::user()->id)->first();
        }
        else{
            $customer=NULL;
        }

        $countries=Countries::all()->pluck('name.common');
        return view('checkout',compact('customer','countries'));
    }
    public function payment(){
        if(!session()->has('success')){
            return redirect('/cart');
        }
        return view('payment');
    }
    
    public function processCod(){
        if(Cart::isEmpty()){
            return redirect('/cart');
        }
        session()->put('payment_method',['name'=>'cod','id'=>NULL]);
        return redirect(route('thankyou'))->with('success','thankyou');
    }
    public function processCheckout(Request $request){
        if(Cart::isEmpty()){
            return redirect('/cart');
        }

        $request->validate([
            'name'=> 'required',
            'email'=>'required|email',
            'number'=> 'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'shipping_address' => 'required_if:shipping_address_different,==,on',
            'shipping_city'=>'required_if:shipping_address_different,==,on',
            'shipping_state'=>'required_if:shipping_address_different,==,on',
            'shipping_zip'=>'required_if:shipping_address_different,==,on',
        ]);

        $data=collect([]);
        if($request->shipping_address_different=='on'){
            $shipping_country = $request->shipping_country;
            $shipping_address = $request->shipping_address;
            $shipping_city=$request->shipping_city;
            $shipping_state=$request->shipping_state;
            $shipping_zip=$request->shipping_zip;
            $ship_to_diff='on';
        }
        else{
            $ship_to_diff='off';
            $shipping_country = NULL;
            $shipping_address = NULL;
            $shipping_city=NULL;
            $shipping_state=NULL;
            $shipping_zip=NULL;
        }
        
        $data->push([
            'billing_country' => $request->country,
            'billing_address' => $request->address,
            'billing_city'=>$request->city,
            'billing_state'=>$request->state,
            'billing_zip'=>$request->zip,
            'billing_phone'=>$request->number,
            'billing_name' => $request->name,
            'billing_email' => $request->email,
            'shipping_address_different'=>$ship_to_diff,
            'shipping_country' => $shipping_country,
            'shipping_address' => $shipping_address,
            'shipping_city'=>$shipping_city,
            'shipping_state'=>$shipping_state,
            'shipping_zip'=>$shipping_zip,
            'shipping_address_different'=>'on',
        ]);
        
        
        session()->forget('checkout_data');
        session()->put('checkout_data',$data);
        return redirect(route('payment'))->with('success','pay');
    }

    protected function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=>'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            notify()->success('You are logged in');
            return back();
        }
    
        notify()->error('Failed to login');
        return back();
    }
}
