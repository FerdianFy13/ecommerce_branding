<div class="table-responsive-sm">
    <?php $currency=get_current_currency()['symbol'];
    if(!is_null($cart_items)){
        $cart_items=unserialize(base64_decode($cart_items));
    }
    ?>
    @if (!is_null($cart_items))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
        
            <tbody>
                <?php $sum=0;?>
                <?php foreach($cart_items as $row) :?>
                    <tr>
                    @include('sections.order_summery')
                    </tr>
                    <?php 
                        if (is_null($row->conditions))
                            $sum=$sum+$row->getPriceSum();
                        else
                            $sum=$sum+$row->getPriceSumWithConditions();     
                    ?>
                <?php endforeach;?>
        
            </tbody>
            
            <tfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Subtotal</td>
                    <td><?php echo $currency.$sum; ?></td>
                </tr>
            </tfoot>
        </table> 
    @else
        No items to show
    @endif
   
</div>
