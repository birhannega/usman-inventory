<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('InventoryId') }}
            {{ Form::text('InventoryId', $inventory->InventoryId, ['class' => 'form-control' . ($errors->has('InventoryId') ? ' is-invalid' : ''), 'placeholder' => 'Inventoryid']) }}
            {!! $errors->first('InventoryId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ItemCode') }}
            {{ Form::text('ItemCode', $inventory->ItemCode, ['class' => 'form-control' . ($errors->has('ItemCode') ? ' is-invalid' : ''), 'placeholder' => 'Itemcode']) }}
            {!! $errors->first('ItemCode', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Quantity') }}
            {{ Form::text('Quantity', $inventory->Quantity, ['class' => 'form-control' . ($errors->has('Quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('Quantity', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UnitPrice') }}
            {{ Form::text('UnitPrice', $inventory->UnitPrice, ['class' => 'form-control' . ($errors->has('UnitPrice') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice']) }}
            {!! $errors->first('UnitPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TotalPrice') }}
            {{ Form::text('TotalPrice', $inventory->TotalPrice, ['class' => 'form-control' . ($errors->has('TotalPrice') ? ' is-invalid' : ''), 'placeholder' => 'Totalprice']) }}
            {!! $errors->first('TotalPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UpdatedUserId') }}
            {{ Form::text('UpdatedUserId', $inventory->UpdatedUserId, ['class' => 'form-control' . ($errors->has('UpdatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Updateduserid']) }}
            {!! $errors->first('UpdatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CreatedUserId') }}
            {{ Form::text('CreatedUserId', $inventory->CreatedUserId, ['class' => 'form-control' . ($errors->has('CreatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Createduserid']) }}
            {!! $errors->first('CreatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>