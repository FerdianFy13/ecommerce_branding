@extends('layouts.app')

@section('title', 'Change info')

@section('content')

  <!-- Hero -->
  <section class="bg-primary text-white pt-7 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">Edit info</h1>
              <p class="lead">Edit your information here</p>
            </div>
        </div>
    </div>
  </section>

  <section class="section py-5 bg-soft">
    <div class="container">
      <div class="row justify-content-center">
  
        @include('partials.dashboardsidebar')

        <div class="col-md-8">
            <div class="card border-light">
                <div class="card-header">Edit info</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>	
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
                    <form action="{{route('profile.info')}}" method="post">
                      @csrf
                      <h6 class="heading-small text-muted mb-4">User information</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <p>Leave any field empty to keep the same<p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="{{auth()->user()->name}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-email">Email address</label>
                              <input type="email" name="email" class="form-control" placeholder="{{auth()->user()->email}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Password</label>
                              <input type="password" name="password" id="input-first-name" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <button type="submit" class="btn btn-info">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Upload Avatar</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-md-12">
                          
                            <form method="post" action="{{route('profile.avatar_remove')}}">
                              @csrf
                                @if(auth()->user()->avatar!='users/default.png')
                                  <img src="{{Voyager::image(auth()->user()->avatar)}}">
                                  <div class="row my-2">
                                    <div class="col-6">
                                      <button type="submit" class="btn btn-sm btn-danger">Remove Avatar</button>
                                    </div>
                                  </div>
                                @else
                                  <img src="{{Voyager::image(auth()->user()->avatar)}}">
                                @endif
                            </form>
                            <form method="post" action="{{route('profile.avatar')}}" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar">
                                        </div>    
                                    </div>
                                  </div>
                                </div>
                                
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-info">Upload avatar</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          
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
  

@endsection
