@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Credit</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('credits.update', $credit->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{@csrf_field()}}

                            @include('credit.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
