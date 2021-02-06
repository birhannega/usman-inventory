@extends('layout.master')
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
                                        
										<th>Item</th>
										<th>Date</th>
                                        <th>Quantity</th>
										<th>Price</th>
										<th>Total Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soldProducts as $soldProduct)
                                        <tr>
                                            
											<td>{{ $soldProduct->ItemName.'('.$soldProduct->product_id.')' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($soldProduct->created_at)->format('d-m-Y')  }}</td>
											<td>{{ $soldProduct->qty }}</td>
											<td>{{ $soldProduct->price }}</td>
											<td>{{ $soldProduct->total_amount }}</td>

                                            <td>
                                                <form action="{{ route('sold-products.destroy',$soldProduct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sold-products.show',$soldProduct->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    {{@csrf_field()}}
                                            
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    {!! $soldProducts->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
@endsection
