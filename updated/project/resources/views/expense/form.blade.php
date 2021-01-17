<div class="box box-info padding-1">
    <div class="box-body">
    
        <div class="form-group">
            {{ Form::label('Amount') }}
            {{ Form::text('exp_amount', $expense->exp_amount, ['class' => 'form-control' . ($errors->has('exp_amount') ? ' is-invalid' : ''), 'placeholder' => 'Exp Amount']) }}
            {!! $errors->first('exp_amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('exp_reason') }}
            {{ Form::text('exp_reason', $expense->exp_reason, ['class' => 'form-control' . ($errors->has('exp_reason') ? ' is-invalid' : ''), 'placeholder' => 'Exp Reason']) }}
            {!! $errors->first('exp_reason', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>