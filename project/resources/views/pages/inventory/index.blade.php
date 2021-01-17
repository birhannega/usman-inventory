@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
                  
                 
            <div class="">
              <a class="btn btn-success" href="{{ route('inventories.index') }}"> List </a>
               <a class="btn btn-primary" href="{{ route('inventories.create') }}"> Add new</a>
            </div>
     
         </div>
               @if ($message = Session::get('success'))
               <div class="pt-2 alert alert-success">
                   <p>{{ $message }}</p>
               </div>
           @endif
      <div class="card-body">

        <div class="container">
            <form method="POST" action="{{ route('search.inventory') }}">
                {{@csrf_field()}}
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="startDate">From</label>
                        <input  type="date" name="startDate" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="startDate">To</label>
                        <input  type="date" name="EndDate" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
             
        <div class="form-group">
            {{ Form::label('choose Item') }}
 
       <select class="form-control form-control-sm" required id="item_code" name="item_code" autocomplete="item_code">
 
             <option value="">Select Item</option>
             @foreach ($items as $item)
              <option  {{ (old('item_code')== $item->Item_code ) ? 'selected' : '' }} value="{{ $item->Item_code }}"> {{ $item->ItemName }} </option>
             @endforeach  
           </select> 
 
 
             {!! $errors->first('item_code', '<div class="invalid-feedback">:message</p>') !!}
         </div>

        </div>

                <div class="form-group">
                    <label for=""><br></label>
                    <button type="submit" class="btn  btn-success">Search</button>
                </div>
              </div>
            </form>
        </div>
           
                    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class=" thead">
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