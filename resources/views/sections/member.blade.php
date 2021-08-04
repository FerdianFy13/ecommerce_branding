<!-- team -->
<section class="section section-lg bg-soft">
    <div class="container">
        <div class="row justify-content-center mb-5 mb-md-7">
            <div class="col-12 col-md-8 text-center">
                <h2 class="h1 font-weight-bolder mb-4">Meet our expert team</h2>
                <p class="lead">Meet our professional team to execute our work</p>
            </div>
        </div>
        <div class="row">
            @foreach ($members as $member)
            <div class="col-12 col-md-6 col-lg-4 mb-5">
                <div class="card shadow-soft border-light">
                    <div class="card-header p-0">
                    <img src="{{is_null($member->image)?'/frontend/img/default.png':Voyager::image($member->image)}}" class="card-img-top rounded-top" alt="image">
                    </div>
                    <div class="card-body">
                    <h3 class="card-title mt-3">{{$member->name}}</h3>
                    <p class="text-info">{{$member->designation}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>