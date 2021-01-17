@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Proforma</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proformas.update', $proforma->p_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{@csrf_field()}}

                            @include('proforma.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
