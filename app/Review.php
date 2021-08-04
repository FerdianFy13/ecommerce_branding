<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    protected $fillable=['rating','description','product_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
