@extends('layouts.app')

@section('template_title')
    {{ $category->name ?? 'Show Category' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cat Id:</strong>
                            {{ $category->Cat_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cat Name:</strong>
                            {{ $category->Cat_name }}
                        </div>
                        <div class="form-group">
                            <strong>Updateduserid:</strong>
                            {{ $category->UpdatedUserId }}
                        </div>
                        <div class="form-group">
                            <strong>Createduserid:</strong>
                            {{ $category->CreatedUserId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
