<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ItemId') }}
            {{ Form::text('ItemId', $item->ItemId, ['class' => 'form-control' . ($errors->has('ItemId') ? ' is-invalid' : ''), 'placeholder' => 'Itemid']) }}
            {!! $errors->first('ItemId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ItemName') }}
            {{ Form::text('ItemName', $item->ItemName, ['class' => 'form-control' . ($errors->has('ItemName') ? ' is-invalid' : ''), 'placeholder' => 'Itemname']) }}
            {!! $errors->first('ItemName', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ItemCategory') }}
            {{ Form::text('ItemCategory', $item->ItemCategory, ['class' => 'form-control' . ($errors->has('ItemCategory') ? ' is-invalid' : ''), 'placeholder' => 'Itemcategory']) }}
            {!! $errors->first('ItemCategory', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('UpdatedUserId') }}
            {{ Form::text('UpdatedUserId', $item->UpdatedUserId, ['class' => 'form-control' . ($errors->has('UpdatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Updateduserid']) }}
            {!! $errors->first('UpdatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CreatedUserId') }}
            {{ Form::text('CreatedUserId', $item->CreatedUserId, ['class' => 'form-control' . ($errors->has('CreatedUserId') ? ' is-invalid' : ''), 'placeholder' => 'Createduserid']) }}
            {!! $errors->first('CreatedUserId', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Item_code') }}
            {{ Form::text('Item_code', $item->Item_code, ['class' => 'form-control' . ($errors->has('Item_code') ? ' is-invalid' : ''), 'placeholder' => 'Item Code']) }}
            {!! $errors->first('Item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>