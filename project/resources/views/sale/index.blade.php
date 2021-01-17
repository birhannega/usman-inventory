@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sale') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>Selled By</th>
										<th>Buyer Name</th>
										<th>Total Amount</th>
										<th>Item Code</th>
										<th>Unit Price</th>
										<th>Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            
											<td>{{ $sale->selled_by }}</td>
											<td>{{ $sale->buyer_name }}</td>
											<td>{{ $sale->total_amount }}</td>
											<td>{{ $sale->item_code }}</td>
											<td>{{ $sale->unit_price }}</td>
											<td>{{ $sale->amount }}</td>

                                            <td>
                                                <form action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sales.show',$sale->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sales.edit',$sale->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                   {{ @csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sales->links() !!}
            </div>
        </div>
    </div>
@endsection
