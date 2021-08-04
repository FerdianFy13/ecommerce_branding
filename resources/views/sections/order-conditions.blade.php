@if (!is_null($conditions))
    @foreach($conditions as $condition)
        @if ($condition->getType()!='coupon')
            <li><strong>{{$condition->getName()}}: </strong><strong>{{two_decimal($condition->getCalculatedValue($subTotal))}}</strong></li>
        @endif
    @endforeach
@else 
    No conditions applied    
@endif