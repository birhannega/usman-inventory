<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id') }}
            {{ Form::text('Id', $companyInformation->Id, ['class' => 'form-control' . ($errors->has('Id') ? ' is-invalid' : ''), 'placeholder' => 'Id']) }}
            {!! $errors->first('Id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_am') }}
            {{ Form::text('description_am', $companyInformation->description_am, ['class' => 'form-control' . ($errors->has('description_am') ? ' is-invalid' : ''), 'placeholder' => 'Description Am']) }}
            {!! $errors->first('description_am', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_en') }}
            {{ Form::text('description_en', $companyInformation->description_en, ['class' => 'form-control' . ($errors->has('description_en') ? ' is-invalid' : ''), 'placeholder' => 'Description En']) }}
            {!! $errors->first('description_en', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_date') }}
            {{ Form::text('created_date', $companyInformation->created_date, ['class' => 'form-control' . ($errors->has('created_date') ? ' is-invalid' : ''), 'placeholder' => 'Created Date']) }}
            {!! $errors->first('created_date', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uodated_date') }}
            {{ Form::text('uodated_date', $companyInformation->uodated_date, ['class' => 'form-control' . ($errors->has('uodated_date') ? ' is-invalid' : ''), 'placeholder' => 'Uodated Date']) }}
            {!! $errors->first('uodated_date', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $companyInformation->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $companyInformation->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deleted') }}
            {{ Form::text('deleted', $companyInformation->deleted, ['class' => 'form-control' . ($errors->has('deleted') ? ' is-invalid' : ''), 'placeholder' => 'Deleted']) }}
            {!! $errors->first('deleted', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>