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
                                <h6>
                                    <strong>
                                       {{Config::get('constants.trade_name_am')}}
                                    </strong>
                                </h6>
                                <p> {{Config::get('constants.trade_name_en')}}</p>
                                <p> Tel: {{Config::get('constants.address.tel2')}}/{{Config::get('constants.address.tel1')}}</p>

                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Fax: ______________, Addis Ababa, Ethiopia</p>
                                        <br>
                                        <p>Address: A.A, s/c <u>{{Config::get('constants.address.subcity')}}</u>  W. <u>{{Config::get('constants.address.woreda')}}</u> Ho.No  <u>{{Config::get('constants.address.house_no')}}</u> </p>
                                        <p>የታክስ ከፋይ መለያ ቁጥር : {{Config::get('constants.tin')}}</p>
                                        <p>Supplier Tin</p>
                                        <p>የሻጭ የተ.እ.ታ ቁጥር: {{Config::get('constants.vat_no')}} </p>
                                        <p>Suppliers VAT REG number </p>
                                        <p>የተሰጠበት ቀን  {{Config::get('constants.licenced_date')}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>FS No _____________________</p>
                                        <p> Date <u> <strong>{{ $sale->created_at->format('Y-m-d') }}</strong></u></p>
                                        <p> Time <u> <strong>{{ $sale->created_at->format('h:i:s') }}</strong></u></p>
                                        <p> Buyer's Name <u> <strong>{{ $sale->buyer_name }}</strong> </u></p>
                                        <p> Buyer's trade Name: {{$sale->buyer_trade_name }}</p>
                                        <p> Buyer's TIn Number  _____________________</p>
                                        <p> Buyer's VAT No. <u> <strong>{{$sale->buyer_vat_no}}</strong> </u> </p>
                                        <p>Address K.k : <u><strong>{{$sale->buyer_subcity}}</strong></u></p>
                                        <p>Kebele <u><strong>{{$sale->buyer_kebele}}</strong></u> House no:  {{empty($sale->buyer_house_no)?'--':$sale->buyer_house_no}}</p>

                                    </div>

                                </div>
                                <div class="col-sm-12">


                                    <h4 class='content-align-center'>Attachement cash sale invoice</h4>

                                    <!-- <p style="margin-bottom:-135px"> Attachement</p> -->

                                    <table class='table table-bordered'
                                        style="border-left:none; border-bottom:none">
                                        <thead>
                                            <th class='text-center'>ተ.ቁ</th>
                                            <th class='text-center'>የአገልግሎት አይነት <br> Description </th>
                                            <th class='text-center'>መለኪያ <br> Unit </th>
                                            <th class='text-center'>ብዛት <br> Quantity </th>
                                            <th class='text-center'>የአንዱ ዋጋ <br> unit price </th>
                                            <th class='text-center'>ጠቅላላ ዋጋ <br> Total price </th>
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
                                                        <td class='text-right'>{{ $sale->price }} </td>
                                                        <td class='text-right'>{{ $sale->price * $sale->qty }} </td>

                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp

                                                @endforeach
                                            @endif




                                            <tr>
                                                <td style="border:none"
                                                    colspan="2"> </td>
                                                <td colspan='3'
                                                    class='text-right'> ድምር/ Total </td>
                                                <td class='text-right'>{{ $subtotal }} </td>


                                            </tr>
                                            <tr>
                                                <td style="border:none"
                                                    colspan="2"> </td>
                                                <td colspan='3'
                                                    class='text-right'>የ ተ. እ.ታ / VAT 15% </td>
                                                <td class='text-right'>{{ $subtotal * 0.15 }} </td>


                                            </tr>
                                            <tr>
                                                <td style="border:none"
                                                    colspan="2"> </td>
                                                <td colspan='3'
                                                    class='text-right'>የ ተ. እ.ታ ጨምሮ(Total inc. vat)</td>

                                                <td rowspan='2'
                                                    class='text-right'>
                                                    {{ 0.15 * $subtotal + $subtotal }}
                                                </td>


                                            </tr>

                                        </tbody>

                                    </table>



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
