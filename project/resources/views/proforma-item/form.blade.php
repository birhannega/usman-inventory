<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('Item_code') }}
           {{ Form::hidden('p_id', $proformaItem->p_id, ['class' => 'form-control' . ($errors->has('Item_code') ? ' is-invalid' : ''), 'placeholder' => 'Item Code']) }}
        

                <select class="form-control form-control-sm"
                onchange="getPrice()"
                name="Item_code"
                id="Item_code">

                <option>Select Item</option>

                @foreach ($items as $item)
                    <option value="{{ $item->Item_code }}"
                        {{ $item->Item_code == $proformaItem->Item_code ? 'selected' : '' }}>
                        {{ $item->ItemName }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('Item_code', '<div class="invalid-feedback">:message</p>') !!}
       
            </div>
        <div class="form-group col-md-6">
            {{ Form::label('amount') }}
            {{ Form::number('amount', $proformaItem->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('unit_price') }}
            {{ Form::text('unit_price', $proformaItem->unit_price, ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 'placeholder' => 'Unit Price']) }}
            {!! $errors->first('unit_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('total_price') }}
            {{ Form::number('total_price', $proformaItem->total_price, ['class' => 'form-control' . ($errors->has('total_price') ? ' is-invalid' : ''), 'placeholder' => 'Total Price','readonly']) }}
            {!! $errors->first('total_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
      
    </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>