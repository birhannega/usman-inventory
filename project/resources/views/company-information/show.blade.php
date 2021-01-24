@extends('layouts.app')

@section('template_title')
    {{ $companyInformation->name ?? 'Show Company Information' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Company Information</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('company-informations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id:</strong>
                            {{ $companyInformation->Id }}
                        </div>
                        <div class="form-group">
                            <strong>Description Am:</strong>
                            {{ $companyInformation->description_am }}
                        </div>
                        <div class="form-group">
                            <strong>Description En:</strong>
                            {{ $companyInformation->description_en }}
                        </div>
                        <div class="form-group">
                            <strong>Created Date:</strong>
                            {{ $companyInformation->created_date }}
                        </div>
                        <div class="form-group">
                            <strong>Uodated Date:</strong>
                            {{ $companyInformation->uodated_date }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $companyInformation->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $companyInformation->updated_by }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $companyInformation->deleted }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
