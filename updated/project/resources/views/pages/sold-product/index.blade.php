@extends('layouts.app')

@section('template_title')
    Sold Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sold Product') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sold_products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Sale Id</th>
										<th>Product Id</th>
										<th>Qty</th>
										<th>Price</th>
										<th>Total Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soldProducts as $soldProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $soldProduct->sale_id }}</td>
											<td>{{ $soldProduct->product_id }}</td>
											<td>{{ $soldProduct->qty }}</td>
											<td>{{ $soldProduct->price }}</td>
											<td>{{ $soldProduct->total_amount }}</td>

                                            <td>
                                                <form action="{{ route('sold_products.destroy',$soldProduct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sold_products.show',$soldProduct->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sold_products.edit',$soldProduct->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $soldProducts->links() !!}
            </div>
        </div>
    </div>
@endsection
