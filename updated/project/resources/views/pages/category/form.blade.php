<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Cat_id') }}
            {{ Form::text('Cat_id', $category->Cat_id, ['class' => 'form-control' . ($errors->has('Cat_id') ? ' is-invalid' : ''), 'placeholder' => 'Cat Id']) }}
            {!! $errors->first('Cat_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cat_name') }}
            {{ Form::text('Cat_name', $category->Cat_name, ['class' => 'form-control' . ($errors->has('Cat_name') ? ' is-invalid' : ''), 'placeholder' => 'Cat Name']) }}
            {!! $errors->first('Cat_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UpdatedUserId') }}
            {{ Form::text('UpdatedUserId', $category->UpdatedUserId, ['class' => 'form-control' . ($errors->has('UpdatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Updateduserid']) }}
            {!! $errors->first('UpdatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CreatedUserId') }}
            {{ Form::text('CreatedUserId', $category->CreatedUserId, ['class' => 'form-control' . ($errors->has('CreatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Createduserid']) }}
            {!! $errors->first('CreatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>