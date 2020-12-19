@extends('layouts.app')

@section('template_title')
    {{ $item->name ?? 'Show Item' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Item</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Itemid:</strong>
                            {{ $item->ItemId }}
                        </div>
                        <div class="form-group">
                            <strong>Itemname:</strong>
                            {{ $item->ItemName }}
                        </div>
                        <div class="form-group">
                            <strong>Itemcategory:</strong>
                            {{ $item->ItemCategory }}
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
