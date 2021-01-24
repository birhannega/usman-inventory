<div class="box box-info padding-1">
    <div class="box-body">
        <div class="box box-info padding-1">
            <div class="box-body">
                {{--
                <div class="row"
                    id="hiddenForm">


                    <div class="form-group col-md-4">
                        {{ Form::label('Item') }}

                        <select class="form-control form-control-sm"
                            onchange="getPrice()"
                            name="item_code"
                            id="item_code">

                            <option>Select Item</option>

                            @foreach ($items as $item)
                                <option value="{{ $item->Item_code }}"
                                    {{ $item->Item_code == $selected ? 'selected' : '' }}> {{ $item->ItemName }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('item_code', '<p class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('unit_price') }}
                        {{ Form::number('unit_price', $sale->unit_price, ['class' => 'form-control' . ($errors->has('unit_price') ? ' is-invalid' : ''), 'placeholder' => 'Unit Price']) }}
                        {!! $errors->first('unit_price', '<p class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('amount') }}
                        {{ Form::text('amount', $sale->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
                        {!! $errors->first('amount', '<p class="invalid-feedback">:message</p>') !!}
                    </div>

                </div> --}}

            </div>
            {{-- <div class="box-footer mt20">
                <button type="submit"
                    class="btn btn-primary">Submit</button>
            </div> --}}
        </div>


    </div>

    <script type="text/javascript">
        function CalculateTotal(id) {
            var unitPrice = document.getElementById('unit_price');
            var uni_price = document.getElementById('unit_price').value;
            var amount = document.getElementById('amount').value;
            amount = isNaN(amount) ? 1 : amount;

            //   unitPrice.min=Price;
            // unitPrice.attributes.min=Price;
            var total = uni_price * amount;

            // unitPrice.value=Price;
            // document.getElementById('total').value = total;
        }

        function AddField() {


        }

    </script>
