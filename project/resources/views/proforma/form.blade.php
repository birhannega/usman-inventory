<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            {{-- @json($proforma_drafted) --}}

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('To') }}
                    {{ Form::text('p_to', !empty($proforma_drafted)?$proforma_drafted->p_to:'', ['class' => 'form-control' . ($errors->has('p_to') ? ' is-invalid' : ''), 'placeholder' => 'P To']) }}
                    {!! $errors->first('p_to', '<div class="invalid-feedback">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('reference number') }}
                        {{ Form::text('ref_number', !empty($proforma_drafted)?$proforma_drafted->ref_number:'', ['class' => 'form-control' . ($errors->has('ref_number') ? ' is-invalid' : ''), 'placeholder' => 'Ref Number']) }}
                        {!! $errors->first('ref_number', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Valid for') }}
                            {{ Form::text('p_valid_for', !empty($proforma_drafted)?$proforma_drafted->p_valid_for:'', ['class' => 'form-control' . ($errors->has('p_valid_for') ? ' is-invalid' : ''), 'placeholder' => 'P Valid For', 'required' => 'P required']) }}
                            {!! $errors->first('p_valid_for', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Delivery Date') }}
                                {{ Form::date('p_delivery_date', !empty($proforma_drafted)?$proforma_drafted->p_delivery_date:'', ['class' => 'form-control' . ($errors->has('p_delivery_date') ? ' is-invalid' : ''), 'placeholder' => 'P Delivery Date', 'required' => 'P required']) }}
                                {!! $errors->first('p_delivery_date', '<div class="invalid-feedback">:message</p>') !!}
                                </div>

                            </div>
                          


                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    {{ Form::label('proforma number') }}
                    {{ Form::text('proforma_number', !empty($proforma_drafted)?$proforma_drafted->proforma_number:$last_pfnumber, ['class' => 'form-control' . ($errors->has('p_to') ? ' is-invalid' : ''), 'placeholder' => 'Add 1 on '.$last_pfnumber]) }}
                    {!! $errors->first('proforma_number', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    </div>

                    <div class="box-footer mt20">
                        @empty($proforma_drafted)
                            <button type="submit"
                                class="btn btn-primary">Submit</button>
                          
                        @endempty


                    </div>
                </div>
