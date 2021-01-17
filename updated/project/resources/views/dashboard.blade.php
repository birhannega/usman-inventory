@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
{{-- 
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Revenue</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Orders</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">3455</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Sales</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">5693</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Employees</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">246</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales </p>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <canvas id="UsersDoughnutChart" class="400x160 mb-4 mb-md-0" height="200"></canvas>
          </div>
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Active Users</h4>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">67,550</p>
                  <small class="text-muted ml-2">Email account</small>
                </div>
                <p class="mb-0 font-weight-medium">80%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">21,435</p>
                  <small class="text-muted ml-2">Requests</small>
                </div>
                <p class="mb-0 font-weight-medium">34%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-3">Amount Due</h4>
            <h1 class="font-weight-medium mb-0">$5998</h1>
            <p class="text-muted">Milestone Completed</p>
            <p class="mb-0">Payment for next week</p>
          </div>
          <div class="col-md-5 d-flex align-items-end mt-4 mt-md-0">
            <canvas id="conversionBarChart" height="150"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-facebook text-facebook icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-facebook font-weight-semibold mb-0">2.62 Subscribers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-google-plus text-google icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-google font-weight-semibold mb-0">3.4k Followers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-5">
        <div class="d-flex flex-row justify-content-center align-items">
          <i class="mdi mdi-twitter text-twitter icon-lg"></i>
          <div class="ml-3">
            <h6 class="text-twitter font-weight-semibold mb-0">3k followers</h6>
            <p class="text-muted card-text">You main list growing</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}


@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush