@extends('layout.master')

@section('template_title')
    Price Change
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Price Change') }}
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
                                        <th>No</th>
                                        
										<th>Old price</th>
										<th>New price</th>
                                        <th>change</th>
										<th>Item Code</th>
										<th>Created By</th>

                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priceChanges as $priceChange)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $priceChange->oldPrice }}</td>
											<td>{{ $priceChange->newPrice }}</td>
                                            <td> +{{ $priceChange->newPrice-$priceChange->oldPrice  }}</td>
											<td>{{ $priceChange->ItemName.'('. $priceChange->Item_code.')' }}</td>
											<td>{{ $priceChange->created_by }}</td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $priceChanges->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
