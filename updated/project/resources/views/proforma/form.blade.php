<div class="box box-info padding-1">
    <div class="box-body">
    <div class="row">
    
      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('To') }}
            {{ Form::text('p_to', $proforma->p_to, ['class' => 'form-control' . ($errors->has('p_to') ? ' is-invalid' : ''), 'placeholder' => 'P To']) }}
            {!! $errors->first('p_to', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('reference number') }}
            {{ Form::text('ref_number', $proforma->ref_number, ['class' => 'form-control' . ($errors->has('ref_number') ? ' is-invalid' : ''), 'placeholder' => 'Ref Number']) }}
            {!! $errors->first('ref_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('Valid for') }}
            {{ Form::text('p_valid_for', $proforma->p_valid_for, ['class' => 'form-control' . ($errors->has('p_valid_for') ? ' is-invalid' : ''), 'placeholder' => 'P Valid For']) }}
            {!! $errors->first('p_valid_for', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       
        <div class="form-group">
            {{ Form::label('Delivery Date') }}
            {{ Form::date('p_delivery_date', $proforma->p_delivery_date, ['class' => 'form-control' . ($errors->has('p_delivery_date') ? ' is-invalid' : ''), 'placeholder' => 'P Delivery Date']) }}
            {!! $errors->first('p_delivery_date', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    
       </div>
       </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>