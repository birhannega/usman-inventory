@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">
         <a class="btn pull-right btn-link" href="">Add new Item</a></h4>
    
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Category name </th>
                <th> Description </th>
                <th> Created Date </th>
                <th> Created by </th>
                <th> Actions </th>
              </tr>
            </thead>
        @if(!$categories->isEmpty())
            <tbody>
        @foreach($categories as $category)
              <tr>
            
                <td class="text-capitalize">{{$category->Category_name}} </td>
                <td> {{$category->Category_desc}}</td>
                <td> {{$category->created_at}}</td>
                <td> {{$category->Created_by}}</td>
                <td> 
                <a href=""><span class=" text-primary mdi mdi-eye "></span></a>
                <a href=""><span class=" text-warning mdi mdi-tooltip-edit "></span></a>
                <a href=""><span class=" text-danger mdi mdi-delete "></span></a>
                </td>

              </tr>

              @endforeach
            </tbody>
            @endif
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush