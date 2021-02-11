<div class="box box-info padding-1">
    <div class="box-body">

    @if (\Request::route()->getName()=='credits.complete')

<h5>Client name:- {{$client->name}} </h5>
<h5>Trade name: {{$client->trade_name}} </h5>
<p>Phone number:  <span class="text-info">{{$client->phone}}</span> </p>

<button type="button"
class="btn btn-info"
data-toggle="modal"
data-target="#addnewItemModal">
{{ __('lang.add_item') }}
</button>
@include('credited-item.form')




    @else

                  <div class="form-group col-md-6">
                    {{ Form::label('Item') }}
                  <select    class="form-control form-control-sm" name="creditFor">
                    <option>Select Item</option>
                    @foreach ($clients as $item)
                    <option value="{{ $item->id }}" 
                      {{ ( $item->id == $selected) ? 'selected' : '' }}> {{ $item->name.'('.$item->trade_name.')' }} </option>
                    @endforeach  
                  </select> 
                    {!! $errors->first('ItemCode', '<div class="invalid-feedback">:message</p>') !!}
                </div> 

              <div class="form-group">
              <button disbled='{{$id==null?"":"disabled"}}' type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>

             
              






     
@endif
       
   
</div>




            {{-- modal start --}}
            <div class="modal fade"
                id="addnewItemModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="addnewItemModal"
                aria-hidden="true">
                <form method="POST" action="{{ route('credited-items.store') }}"  role="form" enctype="multipart/form-data">

                    <div class="modal-dialog"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="addnewItemModal">
                                    {{ __('lang.add_item') }}
                                </h5>
                                <button type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body bg-white">
                                <!-- form start -->
                                <div class="card-body bg-white">
                                    <div class="box box-info padding-1">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <select class="form-control form-control-sm"
                                                    onchange="getPrice()" required
                                                    name="cr_item_code"
                                                    id="cr_item_code">

                                                    <option value="">Select Item</option>

                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->Item_code }}"
                                                           >
                                                            {{ $item->ItemName.'('.$item->Item_code .')' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('amount') }}
                                                  <input type="number" required class="form-control" name="cr_amount" id="cr_amount" placeholder='amount'>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('unit_price') }}
                                                <input type="number" required class="form-control" step='0.001' name="unit_price" id="unit_price" placeholder='unit_price'>

                                            </div>
                                      

                                        </div>

                                    </div>


                                    {{ @csrf_field() }}

                                    <input type="hidden"
                                    name="credit_id" id="credit_id"
                                        value="{{!empty($id)?$id:'' }}">


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('lang.close') }}</button>
                                <button type="submit"
                                    class="btn btn-primary"> {{ __('lang.save') }} </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- modal end --}}
            <script>
              function getPrice() {
                var Price = 0;
                var item = document.getElementById('cr_item_code').value;
                var http = new XMLHttpRequest();
                http.open('get', 'http://127.0.0.1:8000/items/details/' + item, true);
                http.send();
        
                http.onload = function() {
                    if (http.status == 200 && http.readyState == 4) {
                        var response = JSON.parse(http.responseText);
                        Price = response.details.current_price;
        
                        var unitPrice = document.getElementById('unit_price');
                        var amount = document.getElementById('cr_amount').value;
                        amount = isNaN(amount) ? 1 : amount;
                        unitPrice.min = Price;
                        unitPrice.attributes.min = Price;
                        var total = Price * amount;
        
                        unitPrice.value = Price;
                       // document.getElementById('totalprice').value = total;
        
                    }
                }
        
                http.onerror = function() {
                    console.log('request failed')
                }
        
            }
        
        </script>
        