@extends('layout.master')

@push('plugin-styles')
    <!-- {!!  Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <a class="btn btn-sm btn-success"
                            href="{{ route('credits.index') }}"> <span class="mdi mdi-view-list
                                        "></span>Back to List</a>
                        <span class="card-title">Create Credit</span>
                    </div>
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('credits.store') }}"
                            role="form"
                            enctype="multipart/form-data">
                            {{ @csrf_field() }}

                            @include('credit.form')

                        </form>


                        <script type="text/javascript">
                            function getPrice() {
                                var Price = 0;
                                var item = document.getElementById('item_code').value;
                                var http = new XMLHttpRequest();
                                http.open('get', 'http://127.0.0.1:8000/items/details/' + item, true);
                                http.send();

                                http.onload = function() {
                                    if (http.status == 200 && http.readyState == 4) {
                                        var response = JSON.parse(http.responseText);
                                        Price = response.details.current_price;
                                        console.log('price', Price)

                                        var unitPrice = document.getElementById('unitPrice');
                                        // var amount= document.getElementById('amount').value;
                                        // amount= isNaN(amount)?1:amount;

                                        unitPrice.min = Price;
                                        unitPrice.attributes.min = Price;
                                        // var total= Price*amount;

                                        // unitPrice.value=Price;
                                        // document.getElementById('total').value=total;

                                    }
                                }

                                http.onerror = function() {
                                    console.log('request failed')
                                }




                            }

                            function CalculateTotal(id) {
                                var unitPrice = document.getElementById('unit_price');
                                var uni_price = document.getElementById('unit_price').value;
                                var amount = document.getElementById('amount').value;
                                amount = isNaN(amount) ? 1 : amount;

                                //   unitPrice.min=Price;
                                // unitPrice.attributes.min=Price;
                                var total = uni_price * amount;

                                // unitPrice.value=Price;
                                document.getElementById('total').value = total;
                            }

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
