@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header noprint">
                        <span class="card-title">Create Proforma</span>
                    </div>
                    <div class="card-body">

                        @empty($proforma_drafted)
                            
                     
                        <form method="POST"
                            action="{{ route('proformas.store') }}"
                            role="form"
                            enctype="multipart/form-data">
                            {{ @csrf_field() }}

                            @include('proforma.form')

                        </form>
                        @else 
                      
                        <div class="border pt-1 pb-1 pr-1 pl-2" style='border:4px solid blue'> 
                            <h3 class="text-center">{{Config::get('constants.trade_name_am')}}</h3>
                            <h4 class="text-center">{{Config::get('constants.trade_name_en')}} </h4>
                            <p class="text-center">Tin :{{Config::get('constants.tin')}} </p>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-9">
                                <h3 class="text-uppercase text-center"><u>Proforma Invoice</u></h3>
                            </div>

                            <div class="col-md-3">
                                ቀን <u>{{now()->format('Y-m-d')}}</u>
                                Date 
                                <br>
                                መ.ቁ <u>999</u> <br>
                                Ref. no
                                <p>No <u>{{$proforma_drafted->ref_number}}</u></p>
                            </div>
                            <p>To : <u>{{$proforma_drafted->p_to}}</u></p>
                        </div>

                        @endempty


                        <div class="table-responsive ">
                            @if (!empty($proforma_drafted && $proforma_drafted->completed!=1))
                                <div class="py-1 noprint">
                                    <div class="text-left">
                                        {{--
                                        href=""> Add new</a> --}}
                                        <!-- Button trigger modal -->

                                        <button type="button"
                                            class="btn btn-info"
                                            data-toggle="modal"
                                            data-target="#addnewItemModal">
                                            {{ __('lang.add_item') }}
                                        </button>
                                    </div>
                                </div>
                            @endif



                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif         

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                     <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>item</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th> ጠቅላላ ዋጋ <br>
                                        Total price</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($proformaItems as $proformaItem)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td class="text-capitalize">{{  $proformaItem->ItemName.'('. $proformaItem->Item_code.')' }}</td>
											<td>{{ $proformaItem->unit }}</td>
                                            <td>{{ $proformaItem->amount }}</td>
                                            <td>{{ $proformaItem->unit_price }}</td>
                                            <td>{{ $proformaItem->total_price }}</td>

                                            @if (!empty($proforma_drafted && $proforma_drafted->completed!=1))

                                            <td class="noprint">
                                                <form action="{{ route('proforma-items.destroy',$proformaItem->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('proforma-items.show',$proformaItem->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success noprint" href="{{ route('proforma-items.edit',$proformaItem->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{@csrf_field()}}
                                                  
                                                    <button type="submit" class="noprint btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td  colspan="5" style="border:none">
                                            <span class="text-left">
                                              <p>Before VAT 15% : {{$grandtotal*0.15}}</p>   
                                              <p> ቅድመ ክፍያ _____________ </p> 
                                                <p>Advance Payment should be _______________</p>
                                                <p>This proforma is valid for <u>{{!empty($proforma_drafted)?$proforma_drafted->p_valid_for:''}}</u> days </p>
                                                <p>
                                                    የማስረከቢያ ቀን: <u>{{!empty($proforma_drafted)?$proforma_drafted->p_delivery_date:''}}</u>
                                                </p>
                                            </span>
                                            <span style="float: right" class="text-right"> ድምር Total</span>
                                           </td>
                                        <td>{{$grandtotal}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="border:none" class="text-right">ጠቅላላ ድምር / Grand Total</td>
                                        <td>{{$grandtotal+$grandtotal*0.15}}</td>
                                    </tr>
                                </tbody>

                            </table>

                            <div class="py-4 offset-2 col-md-8">
                            <div class="border">
                                <p class="text-center pt-2">አድራሻ፡ Address Tel:- {{Config::get('constants.address.tel2')}}/{{Config::get('constants.address.tel1')}} </p>
                                <p class="text-center">
                                    {{Config::get('constants.address.location')}}
                                </p>
                            </div>
                            </div>
                            @empty($proforma_drafted)
                            @else
                            @if ($proforma_drafted->completed!=1)
                            <form method="POST" action="{{ route('proformas.finish', $proforma_drafted->p_id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{@csrf_field()}}
                                <input type="hidden" name="compelte" id="compelte">
                                <button class="btn btn-warning">Finish proforma preparation</button>

                            </form>
                            @endif
                            @endempty
                           
                          

                           </div>
                            <div class="py-2">
                                {!! $proformaItems->links('pagination::bootstrap-4') !!}
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal start --}}
            <div class="modal fade"
                id="addnewItemModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="addnewItemModal"
                aria-hidden="true">
                <form method="POST" action="{{ route('proforma-items.store') }}"  role="form" enctype="multipart/form-data">

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
                                                    name="Item_code"
                                                    id="Item_code">

                                                    <option value="">Select Item</option>

                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->Item_code }}"
                                                           >
                                                            {{ $item->ItemName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('amount') }}
                                    
                                                  <input type="number" required class="form-control" name="amount" id="amount" placeholder='amount'>
                                          
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('unit_price') }}
                                                <input type="number" required class="form-control" name="unit_price" id="unit_price" placeholder='unit_price'>

                                            </div>
                                      



                                        </div>

                                    </div>











                                    {{ @csrf_field() }}

                                    <input type="hidden"
                                        name="p_id"
                                        value="{{!empty($proforma_drafted)?$proforma_drafted->p_id:'' }}"
                                        id="p_id">


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
        var item = document.getElementById('Item_code').value;
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
               // document.getElementById('totalprice').value = total;

            }
        }

        http.onerror = function() {
            console.log('request failed')
        }

    }

</script>



        </div>
    </section>
@endsection
