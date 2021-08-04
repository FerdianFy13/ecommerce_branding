<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    /**
     * @var ExpressCheckout
     */
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getExpressCheckout(Request $request)
    {
        $recurring = false;
        $cart = $this->getCheckoutData();

        try {
            $response = $this->provider->setExpressCheckout($cart, $recurring);

            if($response['paypal_link']==null){
                return redirect('/checkout')->withErrors('There is an error. Try again.');
            }
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
           
            return redirect('/checkout')->withErrors('Error processing PayPal payment for Order!');
        }
    }

    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Request $request)
    {
        $token = $request->get('token');
        $PayerID = $request->get('PayerID');

        $cart = $this->getCheckoutData();

        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            
            // Perform transaction on PayPal
            $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            

            $invoice = $this->createInvoice($cart, $status);

            if ($invoice['paid']) {
                return redirect(route('thankyou'))->with('success','processed');
            } else {
                session()->forget('payment_method');
                return redirect('/checkout')->withErrors('Error payment processing');            
            }
           
        }
        
    }
    
    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData()
    {
        $data = [];

        Config::set('paypal.currency',get_current_currency()['code']);
        $order_id = uniqid();
        session()->put('payment_method',['name'=>'paypal','id'=>$order_id]);

        $cart_items=\Cart::getContent();

        $data['items'] = collect([]);

        $sum=0;
        foreach($cart_items as $row){
            $sum=$sum+$row->getPriceSumWithConditions();
            $data['items']->push(
                array(
                    'name'  => $row->name,
                    'price' => $row->getPriceWithConditions(),
                    'qty'   => $row->quantity 
                )
            );
        }
        
        $data['return_url'] = url('/paypal/ec-checkout-success');
        

        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = route('checkout');

        if(count(\Cart::getConditionsByType('coupon'))!=0){
            
            $discount=\Cart::getConditionsByType('coupon')->first()->getCalculatedValue($sum);

            $sub_after_discount=$sum-$discount;

            if($sub_after_discount<0){
                $data['items']->push(
                    array(
                        'name'  => 'Discount',
                        'price' => '-'.$sum,
                        'qty'   => 1 
                    )
                );
            }
            else{
                $data['items']->push(
                    array(
                        'name'  => 'Discount',
                        'price' => '-'.$discount,
                        'qty'   => 1 
                    )
                );
            }
 
        }
        
        
        $data['subtotal'] = \Cart::getSubTotal();
        
        if(count(\Cart::getConditions())>0){
            $total = 0;
            foreach (\Cart::getConditions() as $condition) {
                if ($condition->getType()!='coupon'){
                    $total =$total+$condition->getCalculatedValue(\Cart::getSubTotal());
                }
            }

            $data['shipping'] = $total;

        }
        
        $data['total'] = \Cart::getTotal();

        return $data;
    }

    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($cart, $status)
    {
        $invoice=[];
        $invoice['title'] = $cart['invoice_description'];
        $invoice['price'] = $cart['total'];
        if (!strcasecmp($status, 'Completed') || !strcasecmp($status, 'Processed')) {
            $invoice['paid'] = 1;
        } else {
            $invoice['paid'] = 0;
        }
        
        return $invoice;
    }
    
}