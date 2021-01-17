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
                            <span class="card-title">Show Product Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-categories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Name:</strong>
                            {{ $productCategory->Category_name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Updated By:</strong>
                            {{ $productCategory->last_updated_by }}
                        </div>
                        <div class="form-group">
                            <strong>Category Desc:</strong>
                            {{ $productCategory->Category_desc }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $productCategory->Created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
