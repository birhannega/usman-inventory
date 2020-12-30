@extends('layouts.app')

@section('template_title')
    {{ $transfer->name ?? 'Show Transfer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Transfer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('transfers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $transfer->title }}
                        </div>
                        <div class="form-group">
                            <strong>Sender Method Id:</strong>
                            {{ $transfer->sender_method_id }}
                        </div>
                        <div class="form-group">
                            <strong>Receiver Method Id:</strong>
                            {{ $transfer->receiver_method_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sended Amount:</strong>
                            {{ $transfer->sended_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Received Amount:</strong>
                            {{ $transfer->received_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Reference:</strong>
                            {{ $transfer->reference }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
