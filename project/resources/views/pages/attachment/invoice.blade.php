@extends('layout.master')

@push('plugin-styles')
@endpush


@section('content')
    <div class="container">    
        <div class="card">
            <div class="card-header noprint"> Attachement</div>
               <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                          <h6>
                                <strong>
                                ዚነት ሁሴን አህመድ የተሽከርካሪ መለዋወጫና የተጓዳኝ እቃዎች የችርቻሮ ንግድ
                                </strong>
                            </h6> 
                            <p>Zinet Hussien Ahmed Retail sale of parts and accessories </p>
                            
                    </div>
                    <div class="col-md-12">
                    <div class="row">
                                <div class="col-md-6">
                                    <p>Fax: ______________, Addis Ababa, Ethiopia</p>
                                    <br>
                                    <p>Address: A.A, s/c ___ W.__ Ho.No_______</p>
                                    <p>የታክስ ከፋይ መለያ ቁጥር : 0001209644</p>
                                    <p>Supplier Tin</p>
                                    <p>የሻጭ የተ.እ.ታ ቁጥር: 1051650012 </p>
                                    <p>Suppliers VAT REG number </p>
                                    <p>የተሰጠበት ቀን 09/09/2009 </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>FS No _____________________</p>
                                    <p> Date _____________________</p>
                                    <p> Time _____________________</p>
                                    <p> Buyer's Name _____________________</p>
                                    <p> Buyer's trade Name _____________________</p>
                                    <p> Buyer's TIn Number _____________________</p>
                                    <p> Buyer's VAT No. _____________________</p>
                                    <p>Address K.k _____________________</p>
                                    <p>Kebele_____________  house no_______</p>

                                </div>

                    </div>
                    <div class="col-sm-12">
                    
                   
                    <h4 class='content-align-center'>Attachement cash sale invoice</h4>

                    <!-- <p style="margin-bottom:-135px"> Attachement</p> -->
                    
                    <table class='table table-bordered' style="border-left:none; border-bottom:none">
                    <thead>
                    <th class='text-center'>ተ.ቁ</th>
                    <th class='text-center'>የአገልግሎት አይነት <br>  Description </th>
                    <th class='text-center'>መለኪያ  <br>  Unit </th>
                    <th  class='text-center'>ብዛት   <br> Quantity  </th>
                    <th class='text-center'>የአንዱ ዋጋ   <br> unit price  </th>
                    <th class='text-center'>ጠቅላላ ዋጋ    <br> Total price  </th>
                    </thead>
                    <tbody>
                    <tr>
                    <td class='text-right'>1</td>
                    <td>ጀነሬተር </td>
                    <td>ቁጥር </td>
                    <td  class='text-right'>1 </td>
                    <td class='text-right'>14500 </td>
                    <td class='text-right'>14500 </td>

                    </tr>
                    <tr>
                    <td class='text-right'>2</td>
                    <td>ጀነሬተር </td>
                    <td>ቁጥር </td>
                    <td  class='text-right'>100000 </td>
                    <td class='text-right'>14500 </td>
                    <td class='text-right'>14500 </td>

                    </tr>
                    <tr>
                    <td class='text-right'>3</td>
                    <td>ጀነሬተር </td>
                    <td>ቁጥር </td>
                    <td  class='text-right'>1 </td>
                    <td class='text-right'>14500 </td>
                    <td class='text-right'>14500 </td>

                    </tr>
                    <tr>
                    <td class='text-right'>4</td>
                    <td>ጀነሬተር </td>
                    <td>ቁጥር </td>
                    <td  class='text-right'>1 </td>
                    <td class='text-right'>14500 </td>
                    <td class='text-right'>14500 </td>

                    </tr>
                    <tr>
                    <td class='text-right'>5</td>
                    <td>ጀነሬተር </td>
                    <td>ቁጥር </td>
                    <td  class='text-right'>1 </td>
                    <td class='text-right'>14500.00 </td>
                    <td class='text-right'>14500.00 </td>

                    </tr>
                    <tr>
                    <td style="border:none" colspan="2"> </td>
                    <td colspan='3' class='text-right'> ድምር/ Total </td>
                    <td class='text-right'>14500.00 </td>


                    </tr>
                    <tr>
                    <td style="border:none" colspan="2"> </td>
                    <td colspan='3' class='text-right' >የ ተ. እ.ታ / VAT 15% </td>
                    <td class='text-right'>14500.00 </td>


                    </tr>
                    <tr >
                    <td style="border:none" colspan="2"> </td>
                    <td colspan='3' class='text-right'>የ ተ. እ.ታ ጨምሮ(Total inc. vat)</td>
                  
                    <td rowspan='2' class='text-right'>14500.00 </td>


                    </tr>
                    
                    </tbody>
                    
                    </table>

                    
                    
                    </div>
                     </div>  
                 </div>
                </div>     
             </div>  
        </div>
@endsection
