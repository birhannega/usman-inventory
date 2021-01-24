@extends('layout.master')

@push('plugin-styles')
    <!-- {!!  Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

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
                            <a class="btn btn-primary"
                                href="{{ route('credits.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">


                        <div class="form-group">
                            Credited For:
                            <span class="text-capitalize">{{ $credit->name }}</span>
                        </div>
                        <div class="form-group">
                            Created Date:
                            {{ $credit->created_at->format('Y-m-d') }}
                        </div>
                        <div class="form-group">
                            Item Code:
                            {{ $credit->ItemName . '(' . $credit->item_code . ')' }}
                        </div>
                        <div class="form-group">
                            Amount:
                            {{ $credit->amount }}
                        </div>
                        <div class="form-group">
                            Unit Price:
                            {{ $credit->unitPrice }}
                        </div>
                        <div class="form-group">
                            Total Price:
                            {{ $credit->totalprice }}
                        </div>
                        <div class="form-group">
                            Returned:
                            {{ $credit->returned == 1 ? 'Yes' : 'No' }}
                        </div>
                        <div class="form-group">
                            Deleted:
                            {{ $credit->deleted == 1 ? 'Yes' : 'No' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
