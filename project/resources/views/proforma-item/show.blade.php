@extends('layouts.app')

@section('template_title')
    {{ $proformaItem->name ?? 'Show Proforma Item' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proforma Item</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proforma-items.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Item Code:</strong>
                            {{ $proformaItem->Item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $proformaItem->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Price:</strong>
                            {{ $proformaItem->unit_price }}
                        </div>
                        <div class="form-group">
                            <strong>Total Price:</strong>
                            {{ $proformaItem->total_price }}
                        </div>
                        <div class="form-group">
                            <strong>Createdby:</strong>
                            {{ $proformaItem->createdby }}
                        </div>
                        <div class="form-group">
                            <strong>Update At:</strong>
                            {{ $proformaItem->update_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
