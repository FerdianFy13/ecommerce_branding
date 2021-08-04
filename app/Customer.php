<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    protected $fillable=['user_id','billing_address','billing_city','billing_state','billing_zip',
    'shipping_address','shipping_city','shipping_state','shipping_zip'];
}
