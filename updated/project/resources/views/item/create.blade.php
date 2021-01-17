@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('items.index') }}"> back </a>
                      
                    </div>
                    <div class="card-body">
                
                        <form method="POST" action="{{ route('items.store') }}" 
                         role="form" enctype="multipart/form-data">
                           {{ @csrf_field()}}

                            @include('item.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
