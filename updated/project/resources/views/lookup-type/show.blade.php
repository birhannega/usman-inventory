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
                            <span class="card-title">Show Lookup Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lookup-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id:</strong>
                            {{ $lookupType->ltId }}
                        </div>
                        <div class="form-group">
                            <strong>Amharic Description :</strong>
                            {{ $lookupType->description_am }}
                        </div>
                        <div class="form-group">
                            <strong>English Description :</strong>
                            {{ $lookupType->description_en }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $lookupType->deleted==0?'No': 'Yes' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
