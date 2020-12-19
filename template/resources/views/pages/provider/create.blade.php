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
                        <span class="card-title">Create Provider</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('providers.store') }}"  role="form" enctype="multipart/form-data">
                           {{ @csrf_field()}}

                            @include('pages.provider.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush
