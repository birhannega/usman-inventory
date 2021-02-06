@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            
                            <button onclick="Print()" class="btn noprint btn-info">
                                <i class="mdi mdi-printer"></i>
                            </button>

                            <span class="card-title noprint">Show Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary noprint"
                                href="{{ route('sales.index') }}"> Back</a>
                        </div>
                    </div>
                    {{-- @json($sale) --}}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                             
                                <h1 class='text-center'>
                                    <strong>
                                       {{Config::get('constants.trade_name_am')}}
                                    </strong>
                                </h1>
                                <h4 class='text-uppercase text-center mb-2'> {{Config::get('constants.trade_name_en')}}</h4>
                                <div class='mt-2'><br> <br> </div>
                                <h5 > Tel: {{Config::get('constants.address.tel2')}}/{{Config::get('constants.address.tel1')}}</h5>

                            </div>
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="col-md-6">
                                       
                                        <p >Fax: ______________, Addis Ababa, Ethiopia</p>
                                        <p>Address: A.A, s/c <u>{{Config::get('constants.address.subcity')}}</u>  W. <u>{{Config::get('constants.address.woreda')}}</u> Ho.No  <u>{{Config::get('constants.address.house_no')}}</u> </p>
                                        <p>የታክስ ከፋይ መለያ ቁጥር : <u>{{Config::get('constants.tin')}}</u> </p>
                                        <p>Supplier Tin</p>
                                        <p>የሻጭ የተ.እ.ታ ቁጥር:  <u>{{Config::get('constants.vat_no')}}</u> </p>
                                        <p>Suppliers VAT REG number </p>
                                        <p>የተሰጠበት ቀን  {{Config::get('constants.licenced_date')}}</p>
                                    </div>
                                    <div class="col-sm-6 text-left " style='margin-top:-32px; left:20%'>
                                        <p>FS No <u>{{ $sale->fs_number }}</u></p>
                                        <p> Date <u> {{ $sale->created_at->format('Y-m-d') }}</u></p>
                                        <p> Time <u> {{ $sale->created_at->format('h:i:s') }}</u></p>
                                        <p> Buyer's Name <u> {{ $sale->buyer_name }}< </u></p>
                                        <p> Buyer's trade Name: {{$sale->buyer_trade_name }}</p>
                                        <p> Buyer's TIn Number  <u> {{$sale->reference_no }}</u></p>
                                        <p> Buyer's VAT No. <u> {{$sale->buyer_vat_no}} </u> </p>
                                        <p>Address K.k : <u>{{$sale->buyer_subcity}}</u></p>
                                        <p>Kebele <u>{{$sale->buyer_kebele}}</u>  &nbsp;      House no:  {{empty($sale->buyer_house_no)?'--':$sale->buyer_house_no}}</p>

                                                <p class='text-danger pl-5 ml-5'> 
                                              
                                                No. {{$sale->receipt_no}}
                                                </p>
                                    </div>

                                </div>
                                <div class="col-sm-12" 
                                   style='min-height:100px;  
                                                        background-position: center;
                                                        background-repeat: no-repeat;
                                                        background-attachment:relative;
                                                    
                                                          background-size: 40%;
                                                        background-image:url({{url('assets/images/faces/watermark.png')}})'>


                                    <h3 class='text-center'>Attachement cash sale invoice</h3>

                                    <!-- <p style="margin-bottom:-135px"> Attachement</p> -->

                                    <table class='table table-bordered' >

                                        <thead>
                                            <th class='text-center'>ተ.ቁ</th>
                                            <th class='text-center'>የአገልግሎት አይነት <br> Description </th>
                                            <th class='text-center'>መለኪያ <br> Unit </th>
                                            <th class='text-center'>ብዛት <br> Quantity </th>
                                            <th class='text-center' colspan="2">የአንዱ ዋጋ <br> unit price </th>
                                            <th class='text-center' colspan="2">ጠቅላላ ዋጋ <br> Total price </th>
                                        </thead>
                                        <tbody>

                                            @if (!empty($soldProducts))
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($soldProducts as $sale)

                                                    <tr>
                                                        <td class='text-right'>{{ $i }}</td>
                                                        <td>{{$sale->ItemName.'('.$sale->product_id.')' }} </td>
                                                        <td>{{$sale->unit}} </td>
                                                        <td class='text-right'>{{ $sale->qty }} </td>
                                                        <td class='text-right'>
                                                        <!-- {{ $sale->price }}  -->
                                                        {{number_format((int)$sale->price)}}</td>
                                                        <td class='text-right'>{{round(fmod($sale->price ,1),2)}} </td>

                                                        <td class='text-right'>{{ number_format((int) ($sale->price * $sale->qty)) }} </td>
                                                        <td class='text-right'>{{round(fmod($sale->price * $sale->qty ,1),2)}} </td>
                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp

                                                @endforeach
                                            @endif




                                            <tr class="border_bottom">
                                                <td style="border:none"
                                                    colspan="3"> </td>
                                                <td colspan='3'
                                                    class='text-right'> ድምር/ Total </td>
                                                <td class='text-right ' >
                                                <span style="vertical-align: bottom;">
                                                {{  number_format((int)($subtotal)) }} 
                                                </span>
                                                </td>
                                                <td class='text-right'>{{round(fmod($subtotal ,1),2)}}</td>


                                            </tr>
                                            <tr class="border_bottom">
                                                <td style="border:none"
                                                    colspan="3"> </td>
                                                <td colspan='3'
                                                    class='text-right'>የ ተ. እ.ታ / VAT 15% </td>
                                                <td class='text-right'>{{number_format((int) ($subtotal * 0.15)) }} </td>
                                                <td class='text-right'>{{round(fmod( $subtotal  ,1),2)}}</td>


                                            </tr>
                                            <tr class="border_bottom">
                                                <td style="border:none"
                                                    colspan="3"> </td>
                                                <td colspan='3'
                                                    class='text-right'>የ ተ. እ.ታ ጨምሮ(Total inc. vat)</td>

                                                <td  rowspan='2'
                                                    class='text-right'>
                                                    {{ number_format((int)(0.15 * $subtotal + $subtotal)) }}
                                                </td>
                                                <td class='text-right'>{{round(fmod(0.15 * $subtotal + $subtotal ,1),2)}}</td>


                                            </tr>

                                        </tbody>

                                    </table>


                                    <div class='text-center divFooter mt-4'>
                                        <h3>Not Valid without the fiscal Receipt attachement </h3>
                                    </div>

                                    



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



            
    <script type="text/javascript">
      function Print() {
        window.print();  
      }  
    </script>

    </section>
@endsection
