<?php $currency=get_current_currency()['symbol'];?>
@foreach ($products as $product)
<div class="col-md-4">
    <div class="card card-product card-plain">
        <div class="card-image">
            <a href="/product/{{$product->slug}}">
                <img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" />
            </a>
        </div>
        <div class="card-body p-0 m-0">
            
            <h4 class="mt-3"><a href="/product/{{$product->slug}}">{{$product->title}}</a></h4>
            <p class="text-muted">{{is_null($product->category)?"Uncategorized":$product->category->name}}</p>
            <p>
                @if ($product->discounted_price>0)
                    <del>{{$currency}}{{$product->regular_price}}</del> {{$currency}}{{$product->discounted_price}}   
                @else
                    {{$currency}}{{$product->regular_price}} 
                @endif
            </p>
            <div class="d-flex mb-4">
                <?php $sum=0; ?>
                @foreach ($product->reviews as $review)
                    <?php $sum=$sum+$review->rating;?>
                @endforeach
                <?php 
                if(count($product->reviews)>0){
                    $average=$sum/count($product->reviews);
                }
                else{
                    $average=0;
                }
                ?>
                <?php $review_rate=$average; ?>
                <?php get_star_rating($review_rate);?>
            </div>
        </div>
    </div>
    <!-- end card -->
</div>
@endforeach