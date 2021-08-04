@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<!-- Hero -->
<section class="section-header bg-primary text-white pb-7 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-4">Latest News</h1>
                <p class="lead">Know about our press release and news here</p>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
<section class="section section-lg line-bottom-light">
    <div class="container mt-n7 mt-lg-n12 z-2">
        <div class="row">
            <div class="col-lg-12 mb-5">
                @foreach ($posts as $post)
                @if($loop->first)
                <div class="card bg-white border-light shadow-soft flex-md-row no-gutters p-4">
                    <a href="/post/{{$post->slug}}" class="col-md-6 col-lg-6"><img src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}" alt="post-img" class="card-img-top" /></a>
                    <div class="card-body d-flex flex-column justify-content-between col-auto py-4 p-lg-5">
                        <a href="/post/{{$post->slug}}"><h2>{{$post->title}}</h2></a>
                        <p>
                            {{Str::words($post->excerpt,10)}}
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="avatar avatar-sm rounded-circle" src="{{is_null($post->authorId)?'/frontend/img/default.png':Voyager::image($post->authorId->avatar)}}" alt="avatar" />
                            <h6 class="text-muted small ml-2 mb-0">{{is_null($post->authorId)?'Admin':$post->authorId->name}}</h6>
                        <h6 class="text-muted small font-weight-normal mb-0 ml-auto"><time datetime="2019-04-25">{{$post->created_at->diffForHumans()}}</time></h6>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @foreach ($posts as $post)
            @if(!$loop->first)
            <div class="col-12 col-md-4 mb-4">
                <div class="card bg-white border-light shadow-soft p-4 rounded">
                <a href="/post/{{$post->slug}}"><img src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}" class="card-img-top" alt="post img" /></a>
                    <div class="card-body p-0 pt-4">
                        <a href="/post/{{$post->slug}}" class="h3">{{$post->title}}</a>
                        <div class="d-flex align-items-center my-4">
                        <img class="avatar avatar-sm rounded-circle" src="{{is_null($post->authorId)?'/frontend/img/default.png':Voyager::image($post->authorId->avatar)}}" alt="avtar" />
                            <h6 class="text-muted small ml-2 mb-0">{{is_null($post->authorId)?'Admin':$post->authorId->name}}</h6>
                        </div>
                        <p class="mb-0">
                           {{Str::words($post->excerpt,10)}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <div class="d-flex justify-content-center w-100 mt-3">
                <nav aria-label="Page navigation example">
                    {{$posts->links()}}
                </nav>
            </div>
            
        </div>
    </div>
</section>

    
@endsection