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
                            <span class="card-title">Show Proforma</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proformas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>P Id:</strong>
                            {{ $proforma->p_id }}
                        </div>
                        <div class="form-group">
                            <strong>P To:</strong>
                            {{ $proforma->p_to }}
                        </div>
                        <div class="form-group">
                            <strong>P Date:</strong>
                            {{ $proforma->p_date }}
                        </div>
                        <div class="form-group">
                            <strong>Ref Number:</strong>
                            {{ $proforma->ref_number }}
                        </div>
                        <div class="form-group">
                            <strong>P Valid For:</strong>
                            {{ $proforma->p_valid_for }}
                        </div>
                        <div class="form-group">
                            <strong>P Before Vat:</strong>
                            {{ $proforma->p_before_vat }}
                        </div>
                        <div class="form-group">
                            <strong>P Delivery Date:</strong>
                            {{ $proforma->p_delivery_date }}
                        </div>
                        <div class="form-group">
                            <strong>P Total:</strong>
                            {{ $proforma->p_total }}
                        </div>
                        <div class="form-group">
                            <strong>P Grand Total:</strong>
                            {{ $proforma->p_grand_total }}
                        </div>
                        <div class="form-group">
                            <strong>P Created Date:</strong>
                            {{ $proforma->p_created_date }}
                        </div>
                        <div class="form-group">
                            <strong>P Updated Date:</strong>
                            {{ $proforma->p_updated_date }}
                        </div>
                        <div class="form-group">
                            <strong>P Created User Id:</strong>
                            {{ $proforma->p_created_user_id }}
                        </div>
                        <div class="form-group">
                            <strong>P Updated User Id:</strong>
                            {{ $proforma->p_updated_user_id }}
                        </div>
                        <div class="form-group">
                            <strong>P Deleted:</strong>
                            {{ $proforma->p_deleted }}
                        </div>
                        <div class="form-group">
                            <strong>P Is Template:</strong>
                            {{ $proforma->p_is_template }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
