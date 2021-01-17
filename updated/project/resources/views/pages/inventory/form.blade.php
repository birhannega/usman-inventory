<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Item') }}
         
                   <select class="form-control form-control-sm" name="ItemCode">
         
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
        
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Unit Price') }}
                    {{ Form::text('UnitPrice', $inventory->UnitPrice, ['class' => 'form-control' . ($errors->has('UnitPrice') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice']) }}
                    {!! $errors->first('UnitPrice', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('Sale Price') }}
                    {{ Form::number('sale_price', $inventory->sale_price, ['class' => 'form-control' . ($errors->has('sale_price') ? ' is-invalid' : ''), 'placeholder' => 'Unitprice']) }}
                    {!! $errors->first('sale_price', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">VAT included</label>
                    <div class="col-sm-4">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="vat_included" id="vat_included" value="1" checked=""> Yes
                           <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-radio">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="vat_included" id="vat_included" value="0"> No <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        
     
      
       
       
       

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>