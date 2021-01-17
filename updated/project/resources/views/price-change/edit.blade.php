@extends('layouts.app')

@section('template_title')
    Update Price Change
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Price Change</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('price-changes.update', $priceChange->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('price-change.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
