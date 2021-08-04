<div>
    <?php
    if(Cart::session('backend')->isEmpty()){
        $ordered_items=NULL;
    }
    else{
        $ordered_items=Cart::session('backend')->getContent();
    } 
    
    $currency=get_current_currency()['symbol'];
    ?>
    <div class="row">
        @if ($errors->has('product')||$errors->has('quantity'))
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
            <span wire:ignore>
                <select id="select_product" class="w-70">
                    <option></option>
                </select> 
            </span>
            
            <input type="number" placeholder="quantity" class="h-35" wire:model="quantity">       
            <button type="button" id="add_product" class="btn btn-primary" wire:click="addProduct">Add product</button>
            
        </div>
    </div>
    @if (is_null($ordered_items))
        No items to show
    @else
        <div id="custom_ordered_items">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sum=0;?>
                <?php foreach($ordered_items as $row) :?>
                    <tr>
                        <td>
                            <a href="#" wire:click.prevent="removeProduct({{$row->id}})">remove</a>
                        </td>
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
                        <td colspan="3">&nbsp;</td>
                        <td>Subtotal</td>
                        <td><?php echo $currency.$sum; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif
    
</div>




    
