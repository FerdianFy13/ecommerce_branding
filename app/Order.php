<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable=['user_id','invoice_id','billing_name','billing_email','billing_phone','billing_country','billing_address',
    'billing_city','billing_state','billing_zip','shipping_country','shipping_address','shipping_city','shipping_state','shipping_zip',
    'status','ordered_items','conditions','total_amount','payment_method','pp_invoice_id','discount','discounted_subtotal'
    ];

    public function getOrderedItemsReadAttribute(){
        $cart_items=$this->ordered_items;
        return view('sections.order-items',compact('cart_items'));
    }
    public function getConditionsReadAttribute(){
        $subTotal=$this->discounted_subtotal;
       
        if (!is_null($this->conditions)){
            $conditions=unserialize(base64_decode($this->conditions));
        }
        else{
            $conditions=NULL;
        }
        
        return view('sections.order-conditions',compact('conditions','subTotal'));
    }

}
