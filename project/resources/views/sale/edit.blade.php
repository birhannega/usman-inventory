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
                        <span class="card-title">Update Sale</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.update', $sale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                          {{ @csrf_field()}}

                            @include('sale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
