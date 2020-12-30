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
         <a class="btn pull-right btn-link" href="">Add new user</a></h4>
    
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Full name </th>
                <th> Email </th>
                <th> Created Date </th>
                <th> Actions </th>
              </tr>
            </thead>
        @if(!$users->isEmpty())
            <tbody>
        @foreach($users as $user)
              <tr>
            
                <td class="text-capitalize">{{$user->name}} </td>
                <td> {{$user->email}}</td>
                <td> {{$user->created_at}}</td>
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