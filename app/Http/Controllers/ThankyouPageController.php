<?php

namespace App\Http\Controllers;

use Cart;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Mail\UserCreatedMail;
use App\Mail\OrderConfirmMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ThankyouPageController extends Controller
{
    public function index(){
        if(session()->has('success')){

            //create user if not has account
            if(!Auth::user()){
                $this->createUser();
            }
            //store data
            $this->storeData();
            //decrement qty
            $this->decrementQuantity();
            //email customer
            $this->emailOrder();
            //get invoice id
            $invoice_id=session()->get('invoice');
            //session clear
            session()->forget('payment_method');
            session()->forget('invoice');
            session()->forget('checkout_data');
            Cart::clear();

            return view('thankyou',compact('invoice_id'));
        }
        else {
            return redirect('/cart');
        }
    }

    protected function decrementQuantity(){
        if(!Cart::isEmpty()){
            foreach(Cart::getContent() as $row){
                $product=Product::find($row->id);
                if($product){
                    Product::where('id',$row->id)->decrement('quantity',$row->quantity);
                }
            }
        }
        else{
            return back()->withErrors('Not allowed');
        }
    }

    protected function storeData(){
        if(!Cart::isEmpty()){
            $data=session()->get('checkout_data')->first();
            
            if($data['shipping_address_different']=='on'){
                $shipping_country=$data['shipping_country'];
                $shipping_address=$data['shipping_address']; 
                $shipping_city=$data['shipping_city'];
                $shipping_state=$data['shipping_state'];
                $shipping_zip=$data['shipping_zip'];
            }
            else{
                $shipping_country=NULL;
                $shipping_address=NULL; 
                $shipping_city=NULL;
                $shipping_state=NULL;
                $shipping_zip=NULL;
            }

            $latest_order=Order::latest()->first();
            if(is_null($latest_order)){
                Order::truncate();
                $invoice='0001';
            }
            else{
                $invoice=$latest_order->id+1;
                
                function uniqueInvoice($invoice){
                    $i=1;
            
                    $invoice_with_zero=sprintf('%04d',$invoice);
            
                    $check_invoice=\App\Order::where('invoice_id',$invoice_with_zero)->first();
            
                    while($check_invoice){
                        $invoice_new=$invoice+$i;
                        $invoice_new_with_zero=sprintf('%04d',$invoice_new);
                
                        $check_invoice=\App\Order::where('invoice_id',$invoice_new_with_zero)->first();
                
                        if(!$check_invoice){
                            return  $invoice_new_with_zero;
                        }
                
                        $i++;
                    }
                }

                $invoice=uniqueInvoice($invoice);
            }
            
            session()->put('invoice',$invoice);

            //get the user id
            if(Auth::user()){
                $user_id=Auth::user()->id;
            }
            else{
                $user_id=User::where('email',$data['billing_email'])->first()->id;
            }

            $payment=session()->get('payment_method');
            $payment_method=$payment['name'];
            $pp_id=$payment['id'];
            
            //calculate discount
            $sum=0;
            foreach (Cart::getContent() as $row){
                $sum=$sum+$row->getPriceSumWithConditions();
            }
             
            function twoDecimal($number){
                return number_format((float)$number, 2, '.', '');
            }
                    
            if(count(Cart::getConditionsByType('coupon'))!=0){
                $discount=twoDecimal(Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum));
            }
            else{
                $discount=0;
            }          
            
            Order::create([
            'billing_country' => $data['billing_country'],
            'billing_address' => $data['billing_address'],
            'billing_city'=>$data['billing_city'],
            'billing_state'=>$data['billing_state'],
            'billing_zip'=>$data['billing_zip'],
            'shipping_country' => $shipping_country,
            'shipping_address' => $shipping_address,
            'shipping_city'=>$shipping_city,
            'shipping_state'=>$shipping_state,
            'shipping_zip'=>$shipping_zip,
            'billing_phone'=>$data['billing_phone'],
            'billing_name' => $data['billing_name'],
            'billing_email' => $data['billing_email'],
            'status'=>'processing',
            'ordered_items'=>base64_encode(serialize(Cart::getContent())),
            'invoice_id'=>$invoice,
            'user_id'=>$user_id,
            'total_amount'=> Cart::getTotal(),
            'conditions'=>base64_encode(serialize(Cart::getConditions())),
            'payment_method'=>$payment_method,
            'pp_invoice_id'=>$pp_id,
            'discount'=>$discount,
            'discounted_subtotal'=>Cart::getSubTotal(),
            ]);
        }
        else{
            return back()->withErrors('Not allowed');
        }
    }

    protected function emailOrder(){
        $checkout_data=session()->get('checkout_data')->first();
        $invoice_id=session()->get('invoice');

        try{
            Mail::to($checkout_data['billing_email'])->send(new OrderConfirmMail($checkout_data,$invoice_id));

        }catch(\Exception $e){
            Log::error('message :'.$e->getMessage());
        } 
    }

    protected function createUser(){
        $data=session()->get('checkout_data')->first();

        $email=$data['billing_email'];
        $name=$data['billing_name'];
        $password=mt_rand(10000000, 99999999);
        $pass_hashed=Hash::make($password);
        
        $user=User::where('email',$email)->first();
        if(!$user){
            User::create([
                'email'=> $email,
                'name'=> $name,
                'password'=> $pass_hashed,
            ]);
        
            $data=([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
            ]);
            // mail the user
            try{
                Mail::to($email)->send(new UserCreatedMail($data));

            }catch(\Exception $e){
                Log::error('new user creation error :'.$e->getMessage());
            }
        } 
    }
}
