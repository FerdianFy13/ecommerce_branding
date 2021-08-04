@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <!-- Hero -->
  <section class="section-header bg-primary text-white pb-9 pb-lg-13 mb-4 mb-lg-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">Contact Us</h1>
                <p class="lead">Your message is valuable to us. Write to us and we will get back to you.</p>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
<div class="section section-lg pt-0">
    <div class="container mt-n8 mt-lg-n13 z-2">
        <div class="row justify-content-center">
            <div class="col-12">
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
               <!-- Card -->
               <div class="card border-light shadow-soft p-2 p-md-4 p-lg-5">
                <div class="card-body">
                    <form action="{{route('contact.post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" for="firstNameLabel">Name <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                        </div>
                                        <input class="form-control" id="firstNameLabel" placeholder="John Doe" type="text"  name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" for="EmailLabel">Email <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input class="form-control" id="EmailLabel" placeholder="johndoe@company.com" type="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" for="lastNameLabel">Subject <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        </div>
                                        <input class="form-control" id="lastNameLabel" placeholder="Subject" type="text" name="subject" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" for="phonenumberLabel">How can we help you?<span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Hi, I would like to ..." id="message-2" rows="8"  name="message" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary mt-4 animate-up-2"><span class="mr-2"><i class="fas fa-paper-plane"></i></span>Send Message</button>
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
<div class="section section-lg pt-0 line-bottom-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h5 class="mb-3">Email us</h5>
                
            <a class="font-weight-bold text-primary">{{setting('contact.email')}}</a>
            </div>
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <h5 class="mb-3">Call us</h5>
                
                <a class="font-weight-bold text-primary">{{setting('contact.phone')}}</a>
            </div>
            <div class="col-12 col-md-4 text-center px-4">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h5 class="mb-3">Location</h5>
                <a class="font-weight-bold text-primary">{{setting('contact.location')}}</a>

            </div>
        </div>
    </div>
</div>
@include('sections.brand')          
@endsection


