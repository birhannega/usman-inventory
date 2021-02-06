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
                            <span class="card-title">Show Expense</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                      
                        <div class="form-group">
                            <strong>Exp Amount:</strong>
                            {{ $expense->exp_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Exp Reason:</strong>
                            {{ $expense->exp_reason }}
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
