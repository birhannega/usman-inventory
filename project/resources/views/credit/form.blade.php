<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('creditFor') }}
            {{ Form::text('creditFor', $credit->creditFor, ['class' => 'form-control' . ($errors->has('creditFor') ? ' is-invalid' : ''), 'placeholder' => 'Creditfor']) }}
            {!! $errors->first('creditFor', '<div class="invalid-feedback">:message</p>') !!}
        </div>
       
        <!-- <div class="form-group">
            {{ Form::label('item_code') }}
            {{ Form::text('item_code', $credit->item_code, ['class' => 'form-control' . ($errors->has('item_code') ? ' is-invalid' : ''), 'placeholder' => 'Item Code']) }}
            {!! $errors->first('item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div> -->
        <div class="form-group">
            {{ Form::label('item_code') }}
        <select class="form-control" name="item_code">

            <option>Select Item</option>

            @foreach ($items as $item)
            <option value="{{ $item->Item_code }}" {{ ( $item->Item_code == $credit->item_code) ? 'selected' : '' }}> {{ $item->ItemName }} </option>
            @endforeach  
            </select>


            {!! $errors->first('ItemCode', '<div class="invalid-feedback">:message</p>') !!}
             </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $credit->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unitPrice') }}
            {{ Form::text('unitPrice', $credit->unitPrice, ['class' => 'form-control' . ($errors->has('unitPrice') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice']) }}
            {!! $errors->first('unitPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
      
    
     

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>