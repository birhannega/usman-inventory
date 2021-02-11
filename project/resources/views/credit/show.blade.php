@extends('layout.master')
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
                            <strong>Returned:</strong>
                            {{ $credit->returned }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $credit->deleted }}
                        </div>
                        <div class="form-group">
                            <strong>Created User Id:</strong>
                            {{ $credit->created_user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Updated User Id:</strong>
                            {{ $credit->updated_user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
