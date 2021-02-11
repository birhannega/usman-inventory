@extends('layouts.app')

@section('template_title')
    Update Credited Item
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Credited Item</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('credited-items.update', $creditedItem->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('credited-item.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
