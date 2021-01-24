@extends('layouts.app')

@section('template_title')
    Proforma Item
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proforma Item') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('proforma-items.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Item Code</th>
										<th>Amount</th>
										<th>Unit Price</th>
										<th>Total Price</th>
										<th>Createdby</th>
										<th>Update At</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proformaItems as $proformaItem)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proformaItem->Item_code }}</td>
											<td>{{ $proformaItem->amount }}</td>
											<td>{{ $proformaItem->unit_price }}</td>
											<td>{{ $proformaItem->total_price }}</td>
											<td>{{ $proformaItem->createdby }}</td>
											<td>{{ $proformaItem->update_at }}</td>

                                            <td>
                                                <form action="{{ route('proforma-items.destroy',$proformaItem->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('proforma-items.show',$proformaItem->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('proforma-items.edit',$proformaItem->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $proformaItems->links() !!}
            </div>
        </div>
    </div>
@endsection
