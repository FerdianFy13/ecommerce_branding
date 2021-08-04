<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeController extends Controller
{
    public function processStripe(Request $request){
        
        try{

            $charge = Stripe::charges()->create ([
                "amount" => Cart::getTotal(),
                "currency" => get_current_currency()['code'],
                "source" => $request->stripeToken,
                "description" => "Payment from ".env('APP_NAME') 
            ]);
    
            $data=([
                'name'=>'stripe',
                'id'=>$charge['id']
            ]);
            session()->put('payment_method',$data);
            
            return redirect(route('thankyou'))->with('success','Payment complete');
        }catch(\Exception $e){
            return redirect('/checkout')->withErrors($e->getMessage());
        }

    }

    public function refundStripe(Request $request){

        $request->validate([
            'charge'=>'required'
        ]);

        try{
            $refund = Stripe::refunds()->create($request->charge);
            return back()->with('success','Payment refunded');
        }catch(\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    
    }

}
