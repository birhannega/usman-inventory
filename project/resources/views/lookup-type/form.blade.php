<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ltId') }}
            {{ Form::text('ltId', $lookupType->ltId, ['class' => 'form-control' . ($errors->has('ltId') ? ' is-invalid' : ''), 'placeholder' => 'Ltid']) }}
            {!! $errors->first('ltId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_am') }}
            {{ Form::text('description_am', $lookupType->description_am, ['class' => 'form-control' . ($errors->has('description_am') ? ' is-invalid' : ''), 'placeholder' => 'Description Am']) }}
            {!! $errors->first('description_am', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_en') }}
            {{ Form::text('description_en', $lookupType->description_en, ['class' => 'form-control' . ($errors->has('description_en') ? ' is-invalid' : ''), 'placeholder' => 'Description En']) }}
            {!! $errors->first('description_en', '<div class="invalid-feedback">:message</p>') !!}
        </div>
      

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>