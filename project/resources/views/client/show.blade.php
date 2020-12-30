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
                            <span class="card-title">Show Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tin Number:</strong>
                            {{ $client->tin_number }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $client->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $client->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $client->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Last Purchase:</strong>
                            {{ $client->last_purchase }}
                        </div>
                        <div class="form-group">
                            <strong>Total Purchases:</strong>
                            {{ $client->total_purchases }}
                        </div>
                        <div class="form-group">
                            <strong>Total Paid:</strong>
                            {{ $client->total_paid }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
