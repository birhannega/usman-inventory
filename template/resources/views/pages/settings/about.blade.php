@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-header"> compnay Profile </div>
      <div class="card-body">
       <strong>Name: </strong>  <span class='text-primary'>{{ config('app.LongName', 'Laravel') }}</span>
       <p>

       Address: Addis Ababa <br>
       TIn: 0001209644
       Tel : 0911669799
       <br>
       0118548523

       </p>
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