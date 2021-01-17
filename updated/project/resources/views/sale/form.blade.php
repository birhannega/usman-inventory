<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class='row'>
        <div class='col-md-6'>
    
        {{-- <div class="form-group">
            {{ Form::label('choose Item') }}
            {{ Form::text('item_code', $sale->item_code, ['class' => 'form-control' . ($errors->has('item_code') ? ' is-invalid' : ''), 'placeholder' => 'Item Code']) }}
            {!! $errors->first('item_code', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}

        {{-- <div class="form-group">
            <label for="exampleFormControlSelect1">Large select</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
         </div>
         <div class="form-group">
            <div class="form-radio form-radio-flat">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="" checked=""> Option one <i class="input-helper"></i></label>
            </div>
            <div class="form-radio form-radio-flat">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2"> Option two <i class="input-helper"></i></label>
            </div>
          </div> --}}

        <div class="form-group">
            {{ Form::label('choose Item') }}
 
       <select class="form-control form-control-sm" id="item_code" name="item_code" autocomplete="item_code">
 
             <option>Select Item</option>
 
             @foreach ($items as $item)
             <option  {{ (old('item_code')== $item->Item_code ) ? 'selected' : '' }} value="{{ $item->Item_code }}"> {{ $item->ItemName }} </option>

             {{-- <option value="{{ $item->Item_code }}" {{ (old('item_code')== $item->Item_code ) ? 'selected' : '' }}> {{ $item->ItemName }} </option> --}}
             @endforeach  
           </select> 
 
 
             {!! $errors->first('item_code', '<div class="invalid-feedback">:message</p>') !!}
         </div>



        <div class="form-group">
            {{ Form::label('buyer_name') }}
            {{ Form::text('buyer_name', $sale->buyer_name, ['class' => 'form-control' . ($errors->has('buyer_name') ? ' is-invalid' : ''), 'placeholder' => 'Buyer Name']) }}
            {!! $errors->first('buyer_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        </div>
        <div class='col-md-6'>
        <div class="form-group">
            {{ Form::label('unit_price') }}
            {{ Form::text('unit_price', $sale->unit_price, ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 'placeholder' => 'Unit Price']) }}
            {!! $errors->first('unit_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $sale->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        </div>
</div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


