<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class='row'>
        <div class='col-md-6'>
    
    

        <div class="form-group">
            {{ Form::label('choose Item') }}
 
       <select onchange="getPrice(1)" class="form-control form-control-sm" id="item_code" name="item_code" autocomplete="item_code">
 
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
            {{ Form::number('unit_price', $sale->unit_price,  ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 
            'placeholder' => 'Unit Price',
            'id' => 'unit_price'

            ]) }}
            {!! $errors->first('unit_price', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::number('amount', $sale->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''),
             'placeholder' => 'Amount',
             'onchange' =>'getPrice()'
             ]) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        </div>
        
</div>
<div class="form-group offset-6">
  {{ Form::label('Total Price') }}
  <input type="number" readonly class="form-control" name="total" id="total">
</div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

<script type="text/javascript">
 function getPrice(){
   var Price=0;
   var item= document.getElementById('item_code').value;

  var http= new  XMLHttpRequest();
  http.open('get','http://127.0.0.1:8000/items/details/'+item,true);
  http.send();

  http.onload=function(){
    if(http.status==200 && http.readyState==4){
     var response= JSON.parse(http.responseText);
     Price= response.details.current_price;

     var unitPrice= document.getElementById('unit_price');
     var amount= document.getElementById('amount').value;
     amount= isNaN(amount)?1:amount;

     unitPrice.min=Price;
     unitPrice.attributes.min=Price;
     var total= Price*amount;

     unitPrice.value=Price;
     document.getElementById('total').value=total;
     
    }
  }
 
  http.onerror=function(){
    console.log('request failed')
  }
}
</script>