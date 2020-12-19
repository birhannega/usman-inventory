@extends('layout.master')
@push('plugin-styles')
@endpush
@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> <a href="{{ url('/inventories') }}" 
        class="btn pull-right btn-link" href="">Back to List</a>
        </h4>
      
        <form action="#">
          <div class="form-group">
            <div class="row">
                <div class="col-md-1">Product </div>
                <div class="col-md-6">
                <input type="text" name="product" required class="form-control" placeholder="select Item">
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
                <div class="col-md-1">Amount </div>
                <div class="col-md-6">
                <input type="number" min="1" required name="product" class="form-control" placeholder="Enter Amount">
                </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
                <div class="col-md-1">Supplier </div>
                <div class="col-md-6">
                <input type="text" name="product" required class="form-control" placeholder="Enter Amount">
                </div>
            </div>
          </div>


            
          <div class="form-group">
          <div class="row">
          <div class="offset-1 pl-3">
          <button class="btn btn-primary submit-btn ">Register</button>
          </div>
          </div>
          </div>
         
        </form>
        </div>
        </div>
        </div>
        </div>

@endsection
@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
@endpush
@push('custom-scripts')
  {!! Html::script('/assets/js/chart.js') !!}
@endpush