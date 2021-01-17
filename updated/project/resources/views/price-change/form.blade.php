<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('oldPrice') }}
            {{ Form::text('oldPrice', $priceChange->oldPrice, ['class' => 'form-control' . ($errors->has('oldPrice') ? ' is-invalid' : ''), 'placeholder' => 'Oldprice']) }}
            {!! $errors->first('oldPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('newPrice') }}
            {{ Form::text('newPrice', $priceChange->newPrice, ['class' => 'form-control' . ($errors->has('newPrice') ? ' is-invalid' : ''), 'placeholder' => 'Newprice']) }}
            {!! $errors->first('newPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Item_code') }}
            {{ Form::text('Item_code', $priceChange->Item_code, ['class' => 'form-control' . ($errors->has('Item_code') ? ' is-invalid' : ''), 'placeholder' => 'Item Code']) }}
            {!! $errors->first('Item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $priceChange->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>