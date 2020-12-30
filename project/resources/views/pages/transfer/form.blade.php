<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $transfer->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sender_method_id') }}
            {{ Form::text('sender_method_id', $transfer->sender_method_id, ['class' => 'form-control' . ($errors->has('sender_method_id') ? ' is-invalid' : ''), 'placeholder' => 'Sender Method Id']) }}
            {!! $errors->first('sender_method_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receiver_method_id') }}
            {{ Form::text('receiver_method_id', $transfer->receiver_method_id, ['class' => 'form-control' . ($errors->has('receiver_method_id') ? ' is-invalid' : ''), 'placeholder' => 'Receiver Method Id']) }}
            {!! $errors->first('receiver_method_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sended_amount') }}
            {{ Form::text('sended_amount', $transfer->sended_amount, ['class' => 'form-control' . ($errors->has('sended_amount') ? ' is-invalid' : ''), 'placeholder' => 'Sended Amount']) }}
            {!! $errors->first('sended_amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('received_amount') }}
            {{ Form::text('received_amount', $transfer->received_amount, ['class' => 'form-control' . ($errors->has('received_amount') ? ' is-invalid' : ''), 'placeholder' => 'Received Amount']) }}
            {!! $errors->first('received_amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reference') }}
            {{ Form::text('reference', $transfer->reference, ['class' => 'form-control' . ($errors->has('reference') ? ' is-invalid' : ''), 'placeholder' => 'Reference']) }}
            {!! $errors->first('reference', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>