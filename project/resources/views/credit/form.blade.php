<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('credit for') }}

                <select class="form-control form-control-sm"
                    name="creditFor"
                    id="creditFor">
                    <option value="">Select Item</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}"
                            {{ $client->creditFor == $client->id ? 'selected' : '' }}> {{ $client->name }}
                        </option>
                    @endforeach
                </select>


                {!! $errors->first('creditFor', '<p class="invalid-feedback">:message</p>') !!}
            </div>


            <div class="form-group col-md-6">
                {{ Form::label('Item code') }}
                <select class="form-control form-control-sm"
                    onchange="getPrice()"
                    name="item_code"
                    id="item_code">
                    <option value="">Select Item</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->Item_code }}"
                            {{ $item->Item_code == $credit->item_code ? 'selected' : '' }}> {{ $item->ItemName }}
                        </option>
                    @endforeach
                </select>
                {!! $errors->first('ItemCode', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="row">


                <div class="form-group col-md-6">
                    {{ Form::label('Amount') }}
                    {{ Form::text('amount', $credit->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        {{ Form::label('unit Price') }}
                        {{ Form::number('unitPrice', $credit->unitPrice, ['class' => 'form-control' . ($errors->has('unitPrice') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice', 'step' => '0.001']) }}
                        {!! $errors->first('unitPrice', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="box-footer mt20">
                    <button type="submit"
                        class="btn btn-primary">Submit</button>
                </div>
            </div>
