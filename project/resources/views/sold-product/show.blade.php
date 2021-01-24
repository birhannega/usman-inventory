@extends('layout.master')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sold Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary"
                                href="{{ route('sold-products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Sale Id:</strong>
                            {{ $soldProduct->sale_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $soldProduct->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {{ $soldProduct->qty }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $soldProduct->price }}
                        </div>
                        <div class="form-group">
                            <strong>Total Amount:</strong>
                            {{ $soldProduct->total_amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
