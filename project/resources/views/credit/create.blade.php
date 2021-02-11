@extends('layout.master')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Credit</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('credits.store') }}"  role="form" enctype="multipart/form-data">
                          {{ @csrf_field()}}

<div id="form_area" style="visibility: non">
    <form method="POST" action="{{ route('credited-items.store') }}"  role="form" enctype="multipart/form-data">
        {{@csrf_field()}}

        @include('credited-item.form')

    </form>
</div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
