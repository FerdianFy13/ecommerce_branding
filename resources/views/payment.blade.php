@extends('layouts.app')

@section('title', 'Payment')

@section('content')

  <!-- Hero -->
  <section class="pt-7 pb-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">Payment</h1>
                <p class="lead">Please proceed with the payment methods</p>
            </div>
        </div>
    </div>
  </section>

  <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-12 text-center">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Cash on delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Stripe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Paypal</a>
                    </li>
                </ul>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                            <form action="{{route('checkout.cod')}}" method="post">
                                @csrf
                                <p>Pay after delivery</p>
                                <button type="submit" class="btn btn-lg btn-primary">Proceed</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            @include('sections.stripe')
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            <form action="{{route('checkout.paypal')}}" method="post">
                                @csrf
                                <p>Payment using PayPal service</p>
                                <button type="submit" class="btn btn-lg btn-primary">Pay with PayPal</button>
                            </form>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>

@endsection

@section('javascript')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="/frontend/assets/js/payment.js"></script>    
@endsection