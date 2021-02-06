@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
@auth
{{-- <div class="col-md-6 grid-margin stretch-card">
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
</div> --}}
 <div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card  card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cash-usd icon-lg"></i>
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
              <h3 class="font-weight-medium text-right mb-0">{{$items_count}}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- <div class="row">
  <div class="col-md-8">
  <div class="card">
   
    <div class="card-body">
      

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <th>Item</th>
                <th>Current Amount </th>
    
              </thead>
          
            </table>
          </div>
        </div>
      </div>
     
    </div>
    <div class="col-md-4">
      hhh
    </div>
  </div> -->

  <div class="card">
    <div class="card-header">
      {{__('lang.low in stock')}}
    </div>
    <div class="card-body">
    <div class="table-responsive py-2">
                        <table class="table table-striped">
                            <thead class="thead">
                                <tr>

                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Unit</th>
                                    <th>Amount</th>
                                    <th>Current price</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>

                                        <td
                                            class="text-capitalize {{ $item->amount <= 3 ? 'text-danger text-white' : '' }}">
                                            {{ $item->ItemName }}
                                        </td>

                                        <td>{{ $item->Item_code }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->current_price }}</td>

                                        <td>
                                            {{-- <label class="badge badge-danger">Pending</label> --}}
                                            <div class="progress">
                                                <div role="progressbar"
                                                    aria-valuenow="75"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    class="progress-bar {{ $item->amount <= 3 ? 'bg-danger' : 'bg-success' }} "
                                                    style="width:{{ $item->amount <= 3 ? '99%' : '90%' }};">
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <form action="{{ route('items.destroy', $item->Item_code) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('items.show', $item->Item_code) }}"><i
                                                        class="fa fa-fw fa-eye"></i> Show</a>
                                                {{-- <a class="btn btn-sm btn-success"
                                                    href="{{ route('items.edit', $item->Item_code) }}"><i
                                                        class="fa fa-fw fa-edit"></i> Edit</a>
                                                --}}
                                                {{ @csrf_field() }}

                                                <button type="submit"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="py-3">
                            {!! $items->links('pagination::bootstrap-4') !!}

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