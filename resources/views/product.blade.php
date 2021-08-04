@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <!-- Hero -->
    <section class="section-header bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h1 class="display-2 mb-3">Product details</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section py-5">
        <div class="container">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif 
            <?php $currency=get_current_currency()['symbol'];?>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <?php
                        if(!is_null($product->other_image)){
                            $images=json_decode($product->other_image);
                        } 
                        else{
                            $images=collect([]);
                        }
                        
                    ?>
                    @if (count($images)==0)
                        <img src="{{is_null($product->primary_image)?asset('frontend/img/default.png'):Voyager::image($product->primary_image)}}" class="img-fluid" alt="product">
                    @else
                        
                   
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators">
                          
                          @for ($i = 0; $i < count($images)+1; $i++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
                          @endfor    
                            
                        </ol>
                        <div class="carousel-inner">
                            @for ($i = 0; $i < count($images)+1; $i++)
                                <div class="carousel-item {{$i==0?'active':''}}">
                                    @if ($i==0)
                                        <img class="d-block w-100" src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}">
                                    @else
                                        <img class="d-block w-100" src="{{is_null($images[$i-1])?'/frontend/assets/img/default.png':Voyager::image($images[$i-1])}}">
                                    @endif
                                </div> 
                            @endfor 
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @endif
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4">
                        <div class="mb-3">
                            <h2>{{$product->title}}</h2>
                            <?php $sum=0;?>
                            @foreach ($reviews as $review)
                                <?php $sum=$sum+$review->rating;?>
                            @endforeach
                            <?php 
                            if(count($reviews)==0){
                                $average=0;
                            }
                            else{
                                $average=$sum/count($reviews);
                            }
                            ?>
                            <div class="customer-review d-flex mb-2">
                                
                                <div class="d-flex">
                                    <?php $review_rate=$average; ?>
                                    <?php get_star_rating($review_rate);?>
                                    <div class="review-rating">({{count($reviews)}} reviews)</div> 
                                </div>
                                
                            </div>
                            
                            <span class="badge badge-primary mr-1">{{is_null($product->category_id)?'Uncategorized':$product->category->name}}</span>
                            <p class="mt-3">SKU: {{$product->sku}}</p>
                        </div>

                        <p class="lead font-weight-bold">
                            <span>
                                @if($product->discounted_price>0)
                                    <del>{{$currency}}{{$product->regular_price}}</del> {{$currency}}{{$product->discounted_price}}
                                @else
                                    {{$currency}}{{$product->regular_price}}
                                @endif
                            </span>
                        </p>
                        <p>{{$product->small_description}}</p>

                        <form class="d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                            <input type="number" value="1" name="quantity" class="form-control w-25">   
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add to cart
                                <i class="fas fa-shopping-cart ml-1"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Reviews({{count($reviews)}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card border-light">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    {!!clean($product->large_description)!!}
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            @if (count($reviews)==0)
                                                <h3>No reviews yet</h3>
                                            @else
                                                @foreach ($reviews as $review)
                                                    <div class="customer-review d-flex mb-5">
                                                        <img src="{{is_null($review->user)?'/frontend/img/default.png':Voyager::image($review->user->avatar)}}" class="image image-sm mr-3 rounded-circle shadow" alt="user">
                                                        <div class="content bg-soft shadow-soft border border-light rounded position-relative p-4">
                                                            <div class="d-flex mb-4">
                                                                <?php $review_rate=$review->rating; ?>
                                                                <?php get_star_rating($review_rate);?>  
                                                            </div>
                                                            <p class="mt-2">"{{$review->description}}"</p>
                                                            <p>by <strong>{{$review->user->name}}</strong><p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{$reviews->links()}}
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="card border-light">
                                                <div class="card-body">
                                                    @if (Auth::user())
                                                        <form id="review-form" action="{{route('product.add-review')}}" method="post">
                                                            <h2>Add a review</h2>
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-username">Rating</label>
                                                                        <span class="my-rating"></span>
                                                                        <span class="live-rating badge badge-primary"></span>
                                                                        <input type="hidden" name="rating" id="rating">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="review">Review</label>
                                                                        <textarea name="review" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add review
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <p>Please <a href="/login">login</a> to submit a review</p>
                                                    @endif
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-soft py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <h2 class="text-center py-4">You might like</h2>
                    <div class="row">
                        @include('sections.product')
                    </div> 
                </div>
            </div>
        </div>

    </section>
@endsection

@section('javascript')
    <script src="/frontend/assets/js/product.js"></script>
@endsection