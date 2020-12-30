@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                  
                 
                 <div class="">
                 <a class="btn btn-success" href="{{ route('items.index') }}"> List </a>
                <a class="btn btn-primary" href="{{ route('items.create') }}"> Add new</a>
                 </div>
          
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="pt-2 alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Itemname</th>
						
										<th>Item Code</th>
										<th>Unit</th>
										<th>Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td class=" {{ $item->amount<=3?'bg-danger text-white':'' }}">{{ ++$i }}</td>
                                            
											<td>{{ $item->ItemName }}</td>
								
											<td>{{ $item->Item_code }}</td>
											<td>{{ $item->unit }}</td>
											<td>{{ $item->amount }}</td>

                                            <td>
                                                <form action="{{ route('items.destroy',$item->Item_code ) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('items.show',$item->Item_code ) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('items.edit',$item->Item_code ) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{@csrf_field()}}
                                        
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $items->links() !!}
            </div>
        </div>
    </div>
@endsection
