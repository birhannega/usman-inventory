<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('credited_item_id') }}
            {{ Form::text('credited_item_id', $creditedItem->credited_item_id, ['class' => 'form-control' . ($errors->has('credited_item_id') ? ' is-invalid' : ''), 'placeholder' => 'Credited Item Id']) }}
            {!! $errors->first('credited_item_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cr_item_code') }}
            {{ Form::text('cr_item_code', $creditedItem->cr_item_code, ['class' => 'form-control' . ($errors->has('cr_item_code') ? ' is-invalid' : ''), 'placeholder' => 'Cr Item Code']) }}
            {!! $errors->first('cr_item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cr_amount') }}
            {{ Form::text('cr_amount', $creditedItem->cr_amount, ['class' => 'form-control' . ($errors->has('cr_amount') ? ' is-invalid' : ''), 'placeholder' => 'Cr Amount']) }}
            {!! $errors->first('cr_amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('credit_id') }}
            {{ Form::text('credit_id', $creditedItem->credit_id, ['class' => 'form-control' . ($errors->has('credit_id') ? ' is-invalid' : ''), 'placeholder' => 'Credit Id']) }}
            {!! $errors->first('credit_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('returned') }}
            {{ Form::text('returned', $creditedItem->returned, ['class' => 'form-control' . ($errors->has('returned') ? ' is-invalid' : ''), 'placeholder' => 'Returned']) }}
            {!! $errors->first('returned', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deleted') }}
            {{ Form::text('deleted', $creditedItem->deleted, ['class' => 'form-control' . ($errors->has('deleted') ? ' is-invalid' : ''), 'placeholder' => 'Deleted']) }}
            {!! $errors->first('deleted', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unit_price') }}
            {{ Form::text('unit_price', $creditedItem->unit_price, ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 'placeholder' => 'Unit Price']) }}
            {!! $errors->first('unit_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_price') }}
            {{ Form::text('total_price', $creditedItem->total_price, ['class' => 'form-control' . ($errors->has('total_price') ? ' is-invalid' : ''), 'placeholder' => 'Total Price']) }}
            {!! $errors->first('total_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $creditedItem->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $creditedItem->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('accepted_by') }}
            {{ Form::text('accepted_by', $creditedItem->accepted_by, ['class' => 'form-control' . ($errors->has('accepted_by') ? ' is-invalid' : ''), 'placeholder' => 'Accepted By']) }}
            {!! $errors->first('accepted_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cancelled') }}
            {{ Form::text('cancelled', $creditedItem->cancelled, ['class' => 'form-control' . ($errors->has('cancelled') ? ' is-invalid' : ''), 'placeholder' => 'Cancelled']) }}
            {!! $errors->first('cancelled', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>