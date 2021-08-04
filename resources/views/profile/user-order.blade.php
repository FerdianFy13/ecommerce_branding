@extends('layouts.app')

@section('title', 'Orders')

@section('content')

    <!-- Hero -->
    <section class="bg-primary text-white pt-7 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">Orders</h1>
                <p class="lead">See your order information here</p>
                </div>
            </div>
        </div>
    </section>

   
    <div class="section py-5 bg-soft">
        <div class="container">
            <div class="row justify-content-center">

                @include('partials.dashboardsidebar')

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Orders</div>

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
                            <div class="box-body table-responsive-sm no-padding">    
                                <table class="table table-bordered" id="orders-table">
                                    <thead>
                                        <tr>
                                            <th>Invoice Number</th>
                                            <th>Billing Address</th>
                                            <th>Status</th>
                                            <th>Order Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@stop

@section('javascript')
    <script src="/frontend/assets/js/user-order.js"></script>   
@endsection
