@extends('layouts.app')

@section('template_title')
    {{ $priceChange->name ?? 'Show Price Change' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Price Change</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('price-changes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Oldprice:</strong>
                            {{ $priceChange->oldPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Newprice:</strong>
                            {{ $priceChange->newPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Item Code:</strong>
                            {{ $priceChange->Item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $priceChange->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
