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
                 
                        <div class="">
                        <a class="btn btn-success" href="{{ route('items.index') }}"> Back</a>
                            <a class="btn btn-primary" href="{{ route('items.create') }}"> Add new</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Itemname:</strong>
                            {{ $item->ItemName }}
                        </div>
                        <div class="form-group">
                            <strong>Updateduserid:</strong>
                            {{ $item->UpdatedUserId }}
                        </div>
                        <div class="form-group">
                            <strong>Createduserid:</strong>
                            {{ $item->CreatedUserId }}
                        </div>
                        <div class="form-group">
                            <strong>Item Code:</strong>
                            {{ $item->Item_code }}
                        </div>
                        <div class="form-group">
                            <strong>Unit:</strong>
                            {{ $item->unit }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $item->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Deleted:</strong>
                            {{ $item->deleted }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
