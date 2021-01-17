@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Selled By:</strong>
                            {{ $sale->selled_by }}
                        </div>
                        <div class="form-group">
                            <strong>Buyer Name:</strong>
                            {{ $sale->buyer_name }}
                        </div>
                        <div class="form-group">
                            <strong>Total Amount:</strong>
                            {{ $sale->total_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Item Code:</strong>
                            {{ $sale->item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Price:</strong>
                            {{ $sale->unit_price }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $sale->amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
