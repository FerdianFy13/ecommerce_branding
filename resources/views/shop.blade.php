@extends('layouts.app')

@section('title', 'Shop')

@section('content')

    <!-- Hero -->
    <section class="section-header bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                @if (request()->input('query') && !request()->input('category'))
                    <h1 class="display-2 mb-3"> Search results for: {{request()->input('query')}}</h1>
                @elseif(!request()->input('query') && request()->input('category'))
                    <h1 class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                @elseif(request()->input('query') && request()->input('category'))
                    <h1 class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                    <h2>Search results for: {{request()->input('query')}}</h2>
                @else
                    <h1 class="display-2 mb-3">Shop</h1>
                @endif    
            </div>
        </div>
    </div>
    </section>

    <section class="bg-soft py-5">
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
                <div class="col-lg-9 push-md-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
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
                                                    
                                                    {{--Start Rating--}}
                                                    @for ($i = 0; $i < 5; $i++)
                                                    @if (floor($review_rate) - $i >= 1)
                                                        {{--Full Start--}}
                                                        <i class="fas fa-star text-warning"> </i>
                                                    @elseif ($review_rate - $i > 0)
                                                        {{--Half Start--}}
                                                        <i class="fas fa-star-half-alt text-warning"> </i>
                                                    @else
                                                        {{--Empty Start--}}
                                                        <i class="far fa-star text-warning"> </i>
                                                    @endif
                                                    @endfor
                                                    {{--End Rating--}}  
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                        
                    </div>
                          
                    <div class="mt-3 text-center">
                        {{$products->appends(request()->query())->links()}}
                    </div>
                </div>
                <div class="col-lg-3 pull-md-9">
                    <form class="form-inline" action="{{route('shop.search',['query'=>request()->input('query')])}}">
                        <div class="md-form my-0">
                            <input class="form-control mr-sm-2" name="query" value="{{request()->input('query')}}" type="text" placeholder="Search" aria-label="Search">
                        </div>
                    </form>
                    <div class="ml-1">
                        <h4 class="mt-3">Category</h4>
                    
                        <ul class="list-unstyled">
                            @if($categories->count()>0)
                                @foreach($categories as $category)  
                                    <li><a href="{{route('shop.category',['category'=>$category->slug,'query'=>request()->input('query')])}}">{{$category->name}}</a></li>   
                                @endforeach
                            @else
                                No Category
                            @endif
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@stop
