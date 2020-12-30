<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Category_name') }}
            {{ Form::text('Category_name', $productCategory->Category_name, ['class' => 'form-control' . ($errors->has('Category_name') ? ' is-invalid' : ''), 'placeholder' => 'Category Name']) }}
            {!! $errors->first('Category_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_updated_by') }}
            {{ Form::text('last_updated_by', $productCategory->last_updated_by, ['class' => 'form-control' . ($errors->has('last_updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Last Updated By']) }}
            {!! $errors->first('last_updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Category_desc') }}
            {{ Form::text('Category_desc', $productCategory->Category_desc, ['class' => 'form-control' . ($errors->has('Category_desc') ? ' is-invalid' : ''), 'placeholder' => 'Category Desc']) }}
            {!! $errors->first('Category_desc', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Created_by') }}
            {{ Form::text('Created_by', $productCategory->Created_by, ['class' => 'form-control' . ($errors->has('Created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('Created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>