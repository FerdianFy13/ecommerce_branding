
    <td>
        <p><strong><?php echo $row->name; ?></strong></p>
    </td>
    <td>
        <?php echo $row->quantity;?>
    </td>
    <td> 
        @if (is_null($row->conditions))
            {{$currency}}{{$row->price}}
        @else
            @if($row->getPriceWithConditions()!=$row->price)
                <del>{{$currency}}{{$row->price}}</del>{{$currency}}{{$row->getPriceWithConditions()}}
            @else
                {{$currency}}{{$row->price}}
            @endif
        @endif    
    </td>
    <td>
        {{$currency}}
        @if (is_null($row->conditions))
            {{$row->getPriceSum()}} 
        @else
            {{$row->getPriceSumWithConditions()}}
        @endif
    </td>

        



