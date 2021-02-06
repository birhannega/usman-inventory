<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <!-- <div class="form-group col-md-6">
                {{ Form::label('tin_number') }}
                {{ Form::text('tin_number', $client->tin_number, ['class' => 'form-control' . ($errors->has('tin_number') ? ' is-invalid' : ''), 'placeholder' => 'Tin Number']) }}
                {!! $errors->first('tin_number', '<div class="invalid-feedback">:message</p>') !!}
                </div> -->

                <div class="form-group col-md-6">
                    {{ Form::label('trade name') }}
                    {{ Form::text('trade_name', $client->trade_name, ['class' => 'form-control' . ($errors->has('trade_name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('trade_name', '<p class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group col-md-6">
                            {{ Form::label('phone') }}
                            {{ Form::text('phone', $client->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                            {!! $errors->first('phone', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    {{ Form::label('name') }}
                    {{ Form::text('name', $client->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
                    </div>

                    <!-- <div class="form-group col-md-6">
                        {{ Form::label('email') }}
                        {{ Form::text('email', $client->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div> -->
                    <div class="row">
                        <!-- <div class="form-group col-md-12">
                            {{ Form::label('phone') }}
                            {{ Form::text('phone', $client->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                            {!! $errors->first('phone', '<div class="invalid-feedback">:message</p>') !!}
                            </div> -->
                            <!-- <div class="form-group col-md-6">
                                {{ Form::label('Type') }}
                                <select name="type"
                                    class="form-control form-control-sm"
                                    id="type">
                                    <option value="">select type</option>
                                    <option value="1">Buyer</option>
                                    <option value="2">Seller</option>

                                </select>
                                {!! $errors->first('type', '<p class="invalid-feedback">:message</p>') !!}
                            </div> -->
                        </div>




                    </div>
                    <div class="box-footer mt20">
                        <button type="reset"
                            class="btn btn-warning">reset</button>
                        <button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div>
                </div>
