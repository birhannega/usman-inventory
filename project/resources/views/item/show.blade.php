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

                        <div class="">
                            <a class="btn btn-success"
                                href="{{ route('items.index') }}"> Back</a>
                            <a class="btn btn-primary"
                                href="{{ route('items.create') }}"> Add new</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            Name:
                            {{ $item->ItemName }}
                        </div>

                        <div class="form-group">
                            Item Code:
                            {{ $item->Item_code }}
                        </div>
                        <div class="form-group">
                            Unit of measurement:
                            <span class="text-capitalize">{{ $item->unit }}</span>
                        </div>
                        <div class="form-group">
                            current stock Amount:
                            {{ $item->amount }}
                        </div>
                        <div class="form-group">
                            Updated by:
                            {{ $item->UpdatedUserId }}
                        </div>
                        <div class="form-group">
                            Registered by:
                            {{ $item->CreatedUserId }}
                        </div>
                        <div class="form-group">
                            Deleted:
                            <span> {{ $item->deleted == 1 ? 'Yes' : 'No' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
