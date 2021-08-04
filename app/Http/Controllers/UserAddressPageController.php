<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UserAddressPageController extends Controller
{
    public function index(){
        $customer=Customer::where('user_id',auth()->user()->id)->first();

        $countries=Countries::all()->pluck('name.common');
        return view('profile.user-edit-address',compact('customer','countries'));
    }
    public function billing(Request $request){
        $customer=Customer::where('user_id',auth()->user()->id)->first();

        if(!$customer){
            Customer::create([
                'user_id'=> auth()->user()->id,
                'billing_country'=> $request->billing_country,
                'billing_address'=> $request->billing_address,
                'billing_city'=> $request->billing_city,
                'billing_state'=> $request->billing_state,
                'billing_zip'=> $request->billing_zip,
            ]);
        }
        else{
            Customer::where('user_id',auth()->user()->id)->update([
                'billing_country'=> $request->billing_country,
                'billing_address'=> $request->billing_address,
                'billing_city'=> $request->billing_city,
                'billing_state'=> $request->billing_state,
                'billing_zip'=> $request->billing_zip,
            ]);
        }
        return back()->with('success','Data updated');
    }
    public function shipping(Request $request){
        $customer=Customer::where('user_id',auth()->user()->id)->first();

        if(!$customer){
            Customer::create([
                'user_id'=> auth()->user()->id,
                'shipping_country'=> $request->shipping_country,
                'shipping_address'=> $request->shipping_address,
                'shipping_city'=> $request->shipping_city,
                'shipping_state'=> $request->shipping_state,
                'shipping_zip'=> $request->shipping_zip,
            ]);
        }
        else{
            Customer::where('user_id',auth()->user()->id)->update([
                'shipping_country'=> $request->shipping_country,
                'shipping_address'=> $request->shipping_address,
                'shipping_city'=> $request->shipping_city,
                'shipping_state'=> $request->shipping_state,
                'shipping_zip'=> $request->shipping_zip,
            ]);
        }
        
        return back()->with('success','Data updated');
    }
}
