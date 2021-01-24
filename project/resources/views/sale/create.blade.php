@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Sale</span>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>

                            </div>
                        @endif

                        @if (!empty($started_sale) && count($started_sale) > 0)

                            <div class="row">

                                <div class="col-md-5">
                                    <div class="text-capitalize">buyer: {{ $started_sale[0]->buyer_name }} </div>
                                    <div class="text-capitalize">remark: {{ $started_sale[0]->remark }} </div>
                                    <div class="text-capitalize">Date: {{ $started_sale[0]->created_at }}
                                    </div>
                                    <div class="text-capitalize">before vat: {{ $started_sale[0]->before_vat }} </div>
                                    <div class="text-capitalize">After vat: {{ $started_sale[0]->after_vat }} </div>

                                    <div class="py-3">
                                        <div class="text-left">
                                            {{--
                                            href=""> Add new</a> --}}
                                            <!-- Button trigger modal -->

                                            @if ($started_sale[0]->completed == 0)
                                                <button type="button"
                                                    class="btn btn-info"
                                                    data-toggle="modal"
                                                    data-target="#addnewItemModal">
                                                    {{ __('lang.add_item') }}
                                                </button>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-7">

                                    {{-- @json($soldProducts) --}}
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>

                                                <th>Product Id</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soldProducts as $soldProduct)
                                                <tr>

                                                    <td>{{ $soldProduct->product_id }}</td>
                                                    <td>{{ $soldProduct->qty }}</td>
                                                    <td>{{ $soldProduct->price }}</td>
                                                    <td>{{ $soldProduct->total_amount }}</td>

                                                    <td>
                                                        <form
                                                            action="{{ route('sold_products.destroy', $soldProduct->id) }}"
                                                            method="POST">
                                                            {{-- <a
                                                                class="btn btn-sm btn-primary "
                                                                href="{{ route('sold_products.show', $soldProduct->id) }}"><i
                                                                    class="fa fa-fw fa-eye"></i> Show</a>
                                                            --}}
                                                            {{-- <a
                                                                class="btn btn-sm btn-success"
                                                                href="{{ route('sold_products.edit', $soldProduct->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> Edit</a>
                                                            --}}
                                                            {{ @csrf_field() }}
                                                            @if ($started_sale[0]->completed == 0)
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-fw fa-trash"></i> Delete</button>
                                                            @endif


                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">Total</td>
                                                <td>{{ $subtotal }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>




                            {{-- modal start --}}
                            <div class="modal fade"
                                id="addnewItemModal"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="addnewItemModal"
                                aria-hidden="true">
                                <form action="{{ route('soldproducts.store') }}"
                                    method="post">
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

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif


                                                <div class="card-body">
                                                    <div class="form-group">
                                                        {{ Form::label('Item') }}

                                                        <select class="form-control form-control-sm"
                                                            onchange="getPrice()"
                                                            name="product_id"
                                                            id="ItemCode">

                                                            <option>Select Item</option>

                                                            @foreach ($items as $item)
                                                                <option value="{{ $item->Item_code }}"
                                                                    {{ $item->Item_code == $selected ? 'selected' : '' }}>
                                                                    {{ $item->ItemName }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('ItemCode', '<div class="invalid-feedback">
                                                            :message</p>') !!}
                                                        </div>
                                                        {{ @csrf_field() }}
                                                        <div class=" form-group">
                                                            <label
                                                                for="descriptiom">{{ __('lang.unit_price') }}</label>
                                                            <input type="number"
                                                                class="form-control"
                                                                name="price"
                                                                onchange="OnPriceChange()"
                                                                id="unit_price"
                                                                placeholder="Enter unit price" />

                                                        </div>
                                                        <input type="hidden"
                                                            name="sale_id"
                                                            value="{{ $started_sale[0]->id }}"
                                                            id="sell_id">

                                                        <div class=" form-group">
                                                            <label for="descriptiom">{{ __('lang.amount') }}</label>
                                                            <input type="number"
                                                                onchange="OnAmountChange()"
                                                                class="form-control"
                                                                name="qty"
                                                                value="1"
                                                                id="amount"
                                                                placeholder="Enter amount" />
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="total">{{ __('lang.total_amount') }}</label>
                                                            <input type="number"
                                                                class="form-control"
                                                                name="total_amount"
                                                                readonly
                                                                id="totalprice"
                                                                placeholder="Calculated total amount" />
                                                        </div>
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


                        @else

                            <form method="POST"
                                action="{{ route('sales.store') }}">
                                {{ @csrf_field() }}

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="buyername">buyer name</label>
                                            <input type="text"
                                                name="buyer_name"
                                                value="{{ !empty($started_sale[0]) ? $started_sale[0]->buyer_name : '' }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Description">Description</label>
                                            <input name="remark"
                                               value=" {{ !empty($started_sale[0]) ? $started_sale[0]->remark : '' }}"
                                                class="form-control"/>
                                           
                                        </div>
                                      
                                            <div class="col-md-4">
                                                <label for="buyer_trade_name"> Buyer Trade name</label>
                                                <input class="form-control" type="text" name="buyer_trade_name" id="buyer_trade_name">
                                            </div>
                                   
                                            <div class="col-md-4">
                                                <label for="buyer_vat_no"> Buyer VAT number</label>
                                                <input class="form-control" type="text" name="buyer_vat_no" id="buyer_vat_no">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="buyer_subcity"> Buyer subcity</label>
                                                <input class="form-control" type="text" name="buyer_subcity" id="buyer_subcity">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="buyer_worda"> worda</label>
                                                <input class="form-control" type="text" name="buyer_worda" id="buyer_worda">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="buyer_kebele"> kebele</label>
                                                <input class="form-control" type="text" name="buyer_kebele" id="buyer_kebele">
                                            </div>
                                   

                                            
                                        <div class="col-md-8 mt-3 py-3">
                                            <span class="py-5">
                                                <button type="reset" class=" btn btn-warning">reset</button>
                                                <button type="submit" class=" btn btn-success">Save</button>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
                        @endif




                    </div>
                </div>
                @if (!empty($started_sale) && $started_sale[0]->completed == 0)

                    <div class="card card-default py-4">
                        <div class="card-header">
                            <span class="card-title">complete transaction
                            </span>
                        </div>
                        <div class="card-body">
                            <form method="POST"
                                action="{{ route('sales.update', $started_sale[0]->id) }}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="id">sale reference #</label>
                                        <input type="text"
                                            class="form-control"
                                            name="id"
                                            readonly
                                            value="{{ $started_sale[0]->id }}"
                                            id="id">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id">sub total</label>
                                        <input type="text"
                                            class="form-control"
                                            name="subtotal"
                                            readonly
                                            value="{{ $subtotal }}"
                                            id="subtotal">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="include_vat">Include Vat</label>
                                        <input type="checkbox"
                                            name="include_vat"
                                            class="checkbox"
                                            id="include_vat">
                                    </div>
                                </div>

                                <button class="btn btn-success">Finalize transaction</button>

                            </form>
                        </div>
                    </div>
                @endif


            </div>
        </div>


    </section>
@endsection

<script>

    function getPrice() {
        var Price = 0;
        var item = document.getElementById('ItemCode').value;
        var http = new XMLHttpRequest();
        http.open('get', 'http://127.0.0.1:8000/items/details/' + item, true);
        http.send();

        http.onload = function() {
            if (http.status == 200 && http.readyState == 4) {
                var response = JSON.parse(http.responseText);
                Price = response.details.current_price;

                var unitPrice = document.getElementById('unit_price');
                var amount = document.getElementById('amount').value;
                amount = isNaN(amount) ? 1 : amount;

                unitPrice.min = Price;
                unitPrice.attributes.min = Price;
                var total = Price * amount;

                unitPrice.value = Price;
                document.getElementById('totalprice').value = total;

            }
        }

        http.onerror = function() {
            console.log('request failed')
        }

    }
    function OnPriceChange() {
        
               var unitPrice = document.getElementById('unit_price').value;

                var amount = document.getElementById('amount').value;
                amount = isNaN(amount) ? 1 : amount;
                var total = unitPrice * amount;
                document.getElementById('totalprice').value = total;

            
        }

        function OnAmountChange() {
            var unitPrice = document.getElementById('unit_price').value;
                var amount = document.getElementById('amount').value;
                amount = isNaN(amount) ? 1 : amount;

                var total = unitPrice * amount;
                document.getElementById('totalprice').value = total;
        }

       
    

</script>
