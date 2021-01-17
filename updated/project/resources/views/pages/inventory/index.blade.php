@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
             <a class='pb-3 btn btn-sm btn-secondary' href="{{ route('inventories.create') }}"
               data-placement="left">
                                  {{ __('Create New') }}
                    </a>
                           
                     <span class='mb-1'></span>  
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                   
                        <div class="table-responsive mt-2">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>          
                                    <td>Date</td>                          
										<th>Item</th>
										<th>Quantity</th>
                                        <th>Sale price</th>
                                        <th>Unit price</th>
										<th>Total price</th>
									

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventories as $inventory)
                                        <tr>
                                            
                                            <td> {{$inventory->created_at->format('Y-m-d')}}</td>
											<td> {{ $inventory->ItemCode }}</td>
											<td>{{ $inventory->Quantity }}</td>
                                            <td>{{ $inventory->sale_price }}</td>
                                            <td>{{ $inventory->UnitPrice }}</td>
											<td>{{ $inventory->TotalPrice }}</td>
									

                                            <td>
                                                <form action="{{ route('inventories.destroy',$inventory->InventoryId) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventories.show',$inventory->InventoryId) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventories.edit',$inventory->InventoryId) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{@csrf_field()}}
                                                    <!-- @method('DELETE')}} -->
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                      
                    </div>
                <div class="pt-4">
    {!! $inventories->links("pagination::bootstrap-4") !!}
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