@extends('layout.master')



@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Sold Product</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('sold-products.update', $soldProduct->id) }}"
                            role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ @csrf_field() }}

                            @include('sold-product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
