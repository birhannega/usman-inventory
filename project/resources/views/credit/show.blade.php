@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Credit</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('credits.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Credit Id:</strong>
                            {{ $credit->credit_id }}
                        </div>
                        <div class="form-group">
                            <strong>Creditfor:</strong>
                            {{ $credit->creditFor }}
                        </div>
                        <div class="form-group">
                            <strong>Createddate:</strong>
                            {{ $credit->createdDate }}
                        </div>
                        <div class="form-group">
                            <strong>Item Code:</strong>
                            {{ $credit->item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $credit->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Unitprice:</strong>
                            {{ $credit->unitPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Totalprice:</strong>
                            {{ $credit->totalprice }}
                        </div>
                        <div class="form-group">
                            <strong>Returned:</strong>
                            {{ $credit->returned }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $credit->deleted }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
