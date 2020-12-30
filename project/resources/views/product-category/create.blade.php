@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Product Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product-categories.store') }}"  role="form" enctype="multipart/form-data">
                           {{@csrf_field()}} 

                            @include('product-category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
