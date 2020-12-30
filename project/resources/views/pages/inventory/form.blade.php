<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
           {{ Form::label('Item') }}

      <select class="form-control" name="ItemCode">

            <option>Select Item</option>

            @foreach ($items as $item)
            <option value="{{ $item->Item_code }}" {{ ( $item->Item_code == $selected) ? 'selected' : '' }}> {{ $item->ItemName }} </option>
            @endforeach  
          </select> 


            {!! $errors->first('ItemCode', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Quantity') }}
            {{ Form::text('Quantity', $inventory->Quantity, ['class' => 'form-control' . ($errors->has('Quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('Quantity', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Unit Price') }}
            {{ Form::text('UnitPrice', $inventory->UnitPrice, ['class' => 'form-control' . ($errors->has('UnitPrice') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice']) }}
            {!! $errors->first('UnitPrice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
      
       
       

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>