<?php

namespace App\Http\Livewire\VoyagerOrders;

use Livewire\Component;

class ConditionAdd extends Component
{
    public $bread_id;
    public $condition_name;
    public $condition_value;
    
    public function mount($bread_id)
    {
        $this->bread_id = $bread_id;
    }

    public function addCondition()
    {
        $this->validate([
            'condition_name' => 'required',
            'condition_value' => 'required',
        ]);

        if($this->condition_name=='coupon'){
            $this->condition_name='coupon'.'1';
        }

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $this->condition_name,
            'type' => $this->condition_name,
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => $this->condition_value,
        ));

        \Cart::session('backend-add')->condition($condition);

        $this->condition_value='';
        $this->condition_name='';

    }

    public function removeCondition($condition_type){
        \Cart::session('backend-add')->removeConditionsByType($condition_type);
    }
    public function render()
    {
        return view('livewire.voyager-orders.condition-add');
    }
}
