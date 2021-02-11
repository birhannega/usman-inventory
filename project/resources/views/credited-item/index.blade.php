@extends('layouts.app')

@section('template_title')
    Credited Item
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Credited Item') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('credited-items.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
										<th>Credited Item Id</th>
										<th>Cr Item Code</th>
										<th>Cr Amount</th>
										<th>Credit Id</th>
										<th>Returned</th>
										<th>Deleted</th>
										<th>Unit Price</th>
										<th>Total Price</th>
										<th>Created By</th>
										<th>Updated By</th>
										<th>Accepted By</th>
										<th>Cancelled</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creditedItems as $creditedItem)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $creditedItem->credited_item_id }}</td>
											<td>{{ $creditedItem->cr_item_code }}</td>
											<td>{{ $creditedItem->cr_amount }}</td>
											<td>{{ $creditedItem->credit_id }}</td>
											<td>{{ $creditedItem->returned }}</td>
											<td>{{ $creditedItem->deleted }}</td>
											<td>{{ $creditedItem->unit_price }}</td>
											<td>{{ $creditedItem->total_price }}</td>
											<td>{{ $creditedItem->created_by }}</td>
											<td>{{ $creditedItem->updated_by }}</td>
											<td>{{ $creditedItem->accepted_by }}</td>
											<td>{{ $creditedItem->cancelled }}</td>

                                            <td>
                                                <form action="{{ route('credited-items.destroy',$creditedItem->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('credited-items.show',$creditedItem->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('credited-items.edit',$creditedItem->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
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
                {!! $creditedItems->links() !!}
            </div>
        </div>
    </div>
@endsection
