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
                            <span class="card-title">Show Inventory</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inventories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Inventoryid:</strong>
                            {{ $inventory->InventoryId }}
                        </div>
                        <div class="form-group">
                            <strong>Itemcode:</strong>
                            {{ $inventory->ItemCode }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $inventory->Quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Unitprice:</strong>
                            {{ $inventory->UnitPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Totalprice:</strong>
                            {{ $inventory->TotalPrice }}
                        </div>
                        <div class="form-group">
                            <strong>Updateduserid:</strong>
                            {{ $inventory->UpdatedUserId }}
                        </div>
                        <div class="form-group">
                            <strong>Createduserid:</strong>
                            {{ $inventory->CreatedUserId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
