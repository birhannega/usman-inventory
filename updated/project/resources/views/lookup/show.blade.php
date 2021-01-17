@extends('layout.master')

@push('plugin-styles')
@endpush
+

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lookup</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lookups.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Lookupid:</strong>
                            {{ $lookup->lookupId }}
                        </div>
                        <div class="form-group">
                            <strong>Description Am:</strong>
                            {{ $lookup->description_am }}
                        </div>
                        <div class="form-group">
                            <strong>Description En:</strong>
                            {{ $lookup->description_en }}
                        </div>
                        <div class="form-group">
                            <strong>Lookuptypeid:</strong>
                            {{ $lookup->lookuptypeId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
