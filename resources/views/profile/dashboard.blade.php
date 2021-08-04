@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

  <!-- Hero -->
  <section class="bg-primary text-white pt-7 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">Dashboard</h1>
              <p class="lead">This is your dashboard</p>
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
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif

                    This is your dashboard. You can edit your <a href="/dashboard/edit-info">details</a> or visit your <a href="/dashboard/orders">orders</a> from here.
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
  

@endsection
