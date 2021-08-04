@extends('layouts.app')

@section('title','Home')

@section('content')

<section class="section-header" style="background-image: url({{is_null(setting('home.banner'))?'/frontend/img/default.png':Voyager::image(setting('home.banner'))}});">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end"> 
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">{{setting('home.hero_title')}}</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">{{setting('home.hero_subtitle')}}</p>
            <p>
              <a href="/shop" class="btn btn-lg btn-primary">Shop Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="section-header bg-soft">
<div class="site-section site-blocks-2">
    <div class="container">
      <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <a class="block-2-item" href="/shop/category?category={{$category->slug}}">
                    <figure class="image">
                        <img src="{{is_null($category->image)?'/frontend/img/default.png':Voyager::image($category->image)}}" alt="category" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3>{{$category->name}}</h3>
                    </div>
                </a>
            </div>
        @endforeach  
      </div>
    </div>
</div>
</section>

<section class="section section-lg pt-6">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Latest products</h2>
                <p class="lead">See our variety range of products</p>
            </div>
        </div>
        <div class="row">
            @include('sections.product')
        </div>
    </div>
</section>

<section class="section section-lg pt-6">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Featured products</h2>
                <p class="lead">See our featured products</p>
            </div>
        </div>
        <div class="row">
            <?php $products=$featured_products;?>
            @include('sections.product')
        </div>
    </div>
</section>

@include('sections.testimonial')
@include('sections.brand')

@endsection
