@extends('layouts.app')

@section('template_title')
    {{ $creditedItem->name ?? 'Show Credited Item' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Credited Item</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('credited-items.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Credited Item Id:</strong>
                            {{ $creditedItem->credited_item_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cr Item Code:</strong>
                            {{ $creditedItem->cr_item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Cr Amount:</strong>
                            {{ $creditedItem->cr_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Credit Id:</strong>
                            {{ $creditedItem->credit_id }}
                        </div>
                        <div class="form-group">
                            <strong>Returned:</strong>
                            {{ $creditedItem->returned }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $creditedItem->deleted }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Price:</strong>
                            {{ $creditedItem->unit_price }}
                        </div>
                        <div class="form-group">
                            <strong>Total Price:</strong>
                            {{ $creditedItem->total_price }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $creditedItem->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $creditedItem->updated_by }}
                        </div>
                        <div class="form-group">
                            <strong>Accepted By:</strong>
                            {{ $creditedItem->accepted_by }}
                        </div>
                        <div class="form-group">
                            <strong>Cancelled:</strong>
                            {{ $creditedItem->cancelled }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
