<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">

            <div class="form-group">
                {{ Form::label('qty') }}
                {{ Form::text('qty', $soldProduct->qty, ['class' => 'form-control' . ($errors->has('qty') ? ' is-invalid' : ''), 'placeholder' => 'Qty']) }}
                {!! $errors->first('qty', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('price') }}
                    {{ Form::text('price', $soldProduct->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
                    {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('total_amount') }}
                        {{ Form::text('total_amount', $soldProduct->total_amount, ['class' => 'form-control' . ($errors->has('total_amount') ? ' is-invalid' : ''), 'placeholder' => 'Total Amount']) }}
                        {!! $errors->first('total_amount', '<div class="invalid-feedback">:message</p>') !!}
                        </div>

                    </div>
                    <div class="box-footer mt20">
                        <button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div>
                </div>
