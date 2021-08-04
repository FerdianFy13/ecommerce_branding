<?php

use App\Currency;

//get the default currency
function get_current_currency()
{
    $currency=Currency::where('status','active')->first();

    if(!$currency){
        $data=([
            'name'=>'us dollar',
            'code'=> 'USD',
            'symbol'=>'$'
        ]);

        return $data;
    }
    else{
        $data=([
            'name'=>$currency->name,
            'code'=> $currency->code,
            'symbol'=>$currency->symbol
        ]);

        return $data;
    }

}

//get star rating
function get_star_rating($review_rate){
    
    for ($i = 0; $i < 5; $i++){
        if (floor($review_rate) - $i >= 1){
            //Full Start
            echo '<i class="fas fa-star text-warning"> </i>';
        }
        
        else if ($review_rate - $i > 0){
            //Half Start
            echo '<i class="fas fa-star-half-alt text-warning"> </i>';
        }
            
        else{
            //Empty Start
            echo '<i class="far fa-star text-warning"> </i>';
        }
    }    
                            
}

//returns 2 decimal value with . pointer
function two_decimal($number){
    return number_format((float)$number, 2, '.', '');
}
         
    
