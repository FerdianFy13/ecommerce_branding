<!-- testimonial -->
<section class="section section-lg">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-lg-7">
            <div class="col-12 col-md-8 text-center">
                <h1 class="h1 font-weight-bolder mb-4">Our satisfied customers</h1>
                <p class="lead">See what people say about us</p>
            </div>
        </div>
        <div class="row mb-lg-5">
            <div class="col-12 col-lg-6">
                @foreach ($testimonials as $testimonial)
                    @if($loop->first || $loop->iteration=='2')
                    <div class="customer-testimonial d-flex mb-5">
                        <img src="{{is_null($testimonial->image)?'/frontend/img/default.png':Voyager::image($testimonial->image)}}" class="image image-sm mr-3 rounded-circle shadow" alt="user">
                        <div class="content bg-soft shadow-soft border border-light rounded position-relative p-4">
                            <div class="d-flex mb-4">
                                <?php $review_rate=$testimonial->rating; ?>
                                                        
                                <?php get_star_rating($review_rate); ?> 
                            </div>
                            <p class="mt-2">"{{$testimonial->description}}"</p>
                            <span class="h6">- {{$testimonial->name}} <small class="ml-0 ml-md-2">{{$testimonial->designation}}</small></span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="col-12 col-lg-6 pt-lg-6">
                @foreach ($testimonials->slice(2) as $testimonial)
                    <div class="customer-testimonial d-flex mb-5">
                        <img src="{{is_null($testimonial->image)?'/frontend/img/default.png':Voyager::image($testimonial->image)}}" class="image image-sm mr-3 rounded-circle shadow" alt="user">
                        <div class="content bg-soft shadow-soft border border-light rounded position-relative p-4">
                            <div class="d-flex mb-4">
                                <?php $review_rate=$testimonial->rating; ?>
                                                        
                                <?php get_star_rating($review_rate); ?> 
                            </div>
                            <p class="mt-2">"{{$testimonial->description}}"</p>
                            <span class="h6">- {{$testimonial->name}} <small class="ml-0 ml-md-2">{{$testimonial->designation}}</small></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>  
    </div>
</section>