@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       <div class="top:50; bottom:50">
       <span class=" mdi mdi-flask-empty-outline "></span>
       <h4>Error </h4>
       </div>
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