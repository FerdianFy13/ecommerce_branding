@extends('layouts.app')

@section('title', 'Address info')

@section('content')

  <!-- Hero -->
  <section class="bg-primary text-white pt-7 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">Edit address</h1>
              <p class="lead">Edit your address here</p>
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
                <div class="card-header">Edit address</div>

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
                    
                    <?php 
                    if($customer){
                        $billing_address= $customer->billing_address;
                        $billing_city= $customer->billing_city;
                        $billing_state= $customer->billing_state;
                        $billing_zip= $customer->billing_zip;
                        $billing_country= $customer->billing_country;
                        $shipping_address= $customer->shipping_address;
                        $shipping_city= $customer->shipping_city;
                        $shipping_state= $customer->shipping_state;
                        $shipping_zip= $customer->shipping_zip;
                        $shipping_country= $customer->shipping_country;
                    }
                    else{
                        $billing_address= '';
                        $billing_city= '';
                        $billing_state= '';
                        $billing_zip= '';
                        $billing_country='';
                        $shipping_address= '';
                        $shipping_city= '';
                        $shipping_state= '';
                        $shipping_zip= '';
                        $shipping_country='';
                    }
                    ?>
                    <form action="{{route('profile.billing')}}" method="post">
                      @csrf
                      <h6 class="heading-small text-muted mb-4">Billing information</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <p>Leave any field empty to keep the same<p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="billing_country">Billing country</label>
                              <select name="billing_country" id="billing_country">
                                @foreach ($countries as $country)
                                  <option value="{{$country}}" {{$billing_country==$country?'selected':''}}>{{$country}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Billing address</label>
                              <input type="text" name="billing_address" class="form-control" value="{{$billing_address}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-email">Billing city</label>
                              <input type="text" name="billing_city" class="form-control" value="{{$billing_city}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Billing state</label>
                              <input type="text" name="billing_state" id="input-first-name" class="form-control" value="{{$billing_state}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Billing zip</label>
                                <input type="text" name="billing_zip" id="input-first-name" class="form-control" value="{{$billing_zip}}">
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
                    <form action="{{route('profile.shipping')}}" method="post">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Shipping information</h6>
                        <div class="pl-lg-4">
                          <div class="row">
                            <div class="col-lg-6">
                              <p>Leave any field empty to keep the same<p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="shipping_country">Shipping country</label>
                                <select name="shipping_country" id="shipping_country">
                                  @foreach ($countries as $country)
                                    <option value="{{$country}}" {{$shipping_country==$country?'selected':''}}>{{$country}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-username">Shipping address</label>
                                <input type="text" name="shipping_address" class="form-control" value="{{$shipping_address}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-email">Shiping city</label>
                                <input type="text" name="shipping_city" class="form-control" value="{{$shipping_city}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Shipping state</label>
                                <input type="text" name="shipping_state" id="input-first-name" class="form-control" value="{{$shipping_state}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label class="form-control-label" for="input-first-name">Shipping zip</label>
                                  <input type="text" name="shipping_zip" id="input-first-name" class="form-control" value="{{$shipping_zip}}">
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
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
  

@endsection
