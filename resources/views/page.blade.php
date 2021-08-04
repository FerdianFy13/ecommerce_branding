@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$page->title}}">
<meta name="description" content="{{$page->meta_description}}">
<meta name="keywords" content="{{$page->meta_keywords}}">
@stop

@section('title', $page->title)

@section('content')

<!-- Hero -->
<section class="section-header bg-primary text-white">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">{{$page->title}}</h1>
          </div>
      </div>
  </div>
</section>
<div class="container mt-5 mb-5 pt-5">

  @if(!is_null($page->image))
    <figure class="figure">
      <img src="{{Voyager::image($page->image)}}" class="figure-img img-fluid z-depth-1" alt="page image">
    </figure>
  @endif  
  <!--Section: Content-->
  <section class="text-justify">
    {!!clean($page->body)!!}
  </section>
  <!--Section: Content-->

</div>

@stop