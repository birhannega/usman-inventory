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
                            <span class="card-title">Show Provider</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('providers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $provider->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $provider->description }}
                        </div>
                        <div class="form-group">
                            <strong>Paymentinfo:</strong>
                            {{ $provider->paymentinfo }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $provider->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $provider->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
