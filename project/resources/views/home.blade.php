@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
@auth
<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="d-flex align-items-center pb-2">
            <div class="dot-indicator bg-danger mr-2"></div>
            <p class="mb-0">Total Sales</p>
          </div>
          <h4 class="font-weight-semibold">$7,590</h4>
          <div class="progress progress-md">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="d-flex align-items-center pb-2">
            <div class="dot-indicator bg-success mr-2"></div>
            <p class="mb-0">Active Users</p>
          </div>
          <h4 class="font-weight-semibold">$5,460</h4>
          <div class="progress progress-md">
            <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card  card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cash-usd
 icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Expenses today</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$today_expenses}}</h3>
            </div>
          </div>
        </div>
      
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
            <p class="mb-0 text-right">{{__('lang.sales')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$sales}}</h3>
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
            <i class="mdi mdi-format-list-numbered text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">{{__('lang.items')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$items}}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> show </p>
      </div>
    </div>
  </div>
</div>




@endAuth
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush