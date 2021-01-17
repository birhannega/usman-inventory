<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Name') }}
        {{ Form::text('ItemName', $item->ItemName, 
            ['class' => 'form-control' . ($errors->has('ItemName') ? ' is-invalid' : ''), 
            
            'placeholder' => 'Itemname']) }} 

            {!! $errors->first('ItemName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
   
        <div class="form-group">
            {{ Form::label('code') }}
            {{ Form::text('Item_code', $item->Item_code, ['class' => 'form-control' . ($errors->has('Item_code') ? ' is-invalid' : ''), 
             'disabled'=>'disabled','placeholder' => 'Item Code']) }}
            {!! $errors->first('Item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unit of Measurement') }}
            {{ Form::text('unit', $item->unit, ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : ''), 'placeholder' => 'Unit']) }}
            {!! $errors->first('unit', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Initial Amount') }}
            {{ Form::text('amount', $item->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''),
             'placeholder' => 'Amount',
             'disabled'=>'disabled'
             ]) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>