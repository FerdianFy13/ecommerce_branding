<div>
    <div class="row">
        @if ($errors->has('condition_name')||$errors->has('condition_value'))
        <div class="col-12 col-md-6">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        </div>
        @endif 
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <input type="text" placeholder="condition name"  wire:model="condition_name">
            <input type="number" placeholder="condition amount" wire:model="condition_value">       
            <button type="button" class="btn btn-primary" wire:click="addCondition">Add condition</button>
        </div>
    </div>

    <?php $conditions=Cart::session('backend-add')->getConditions();?>
    @if (!is_null($conditions))
        @foreach($conditions as $condition)
            @if ($condition->getType()!='coupon')
                <li><strong>{{$condition->getName()}}: </strong><strong>{{two_decimal($condition->getCalculatedValue(Cart::session('backend-add')->getSubtotal()))}}</strong>(<a href="#" wire:click.prevent="removeCondition('{{$condition->getType()}}')">Remove</a>)</li>
            @endif
        @endforeach
    @else 
        No conditions applied    
    @endif
</div>
