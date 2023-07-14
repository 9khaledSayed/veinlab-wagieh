<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap'); 
    body {
        margin: 0;
        font-family: 'Cairo';
        padding: 0;
        font: 62.5%/1.5; 
        margin: 0;
        width: 100%;

    }


    #invoice {
        margin: 0 5pt;
        width: 1100px;
        padding: 10px 10px;
        margin: 1em auto;
        clear: both;
        position: relative;
        background: #fff
    }


    #result_information {
        width: 97%;
        margin: 50px 10%;
        display: inline-block;
        box-sizing: border-box
    }

    #logo {

        /* border-left: 5px solid black; */
        padding: 5px;
        display: inline-block;
        position: relative;
        top: -24px;
        width:50%


    }

    #logo #image-logo {
        display: inline-block;
    }

    #Analyis_title {
        width: 100%;
        text-align: center;

    }

    #patient_name {
        padding: 10px;
        display: inline-block;
        position: relative;
        top: -29px;
        width: 30%;
        overflow-wrap: break-word;


    }

    #patient_name>h1 {
        padding: 10px;

    }

    #text-header-info {
        font-size: 25px;
        margin-left: 20px;
        display: inline-block;
        text-align: end;
        top: -19px;
        line-height: 44px; 
        padding-right: 20px;  
        border-right: 6px solid gray;
        width: 44%;

     
    }

    #text-header-info div {
        padding: 0px 5px;
    }


    #table-contain {
        width: 100%;
    }

    #table-contain table {
        width: 90%;
        margin-left: 5%;
        font-size: 15px;
    }
    #table-contain table  tr th{
        font-size: 36px !important;
        padding-bottom: 20px !important;
        font-weight: normal;
    }

    #table-contain table tr td,
    th {
        width: 15% !important;
        text-align: center;

    }


    #footer{

        width: 100%;
        border-bottom: 40px solid #07804a;
        position: fixed;
        font-size: 20px;
        top:1400px;
        padding-bottom: 15px;
    }

    #footer>div {
        display: inline-block;
        margin-top: 80px;
    }

    #footer #contact-info {
        margin-left: 5%;
    }

    #footer #address {
        display: inline-block;
        width: 30% !important;
        line-height: 10px;
        padding-bottom: 2%;
        position: relative;
        padding-right: 41px;
        top: 10px;
        color: #07804a;
        line-height: 26px;
    }

    #footer #address i{
        position: relative;
        right: 40px;
        top: 20px;
        font-size: 40px !important;
    }

   
    #footer #number {
        display: inline-block;
        color: #07804a;
        position: relative;
        top: 20px;
        font-size: 23px !important;

        
    }
    #footer #number div {
        margin: 8px;
    }

    #footer #number i {
        padding-right: 8px;
        color: white;
        background-color: #07804a;
        padding: 5px;
        margin-top: 10px !important;
        border-radius: 50%;
    }


    #footer #barcode-signature {
        float: right;
        margin-right: 5%;
        position: relative;
        top :250px;        
    }

    #footer #barcode {
        display: inline-block;

    }

    #footer #signature {
        display: inline-block;
        position: relative;
        padding-right: 41px;
        top: -20px;

    }
    </style>
</head>

<body>




    <!--begin::Portlet-->
    <div id="invoice">

        <div>

            <div>
            <img alt="Logo" class="" dir="rtl"
                    style=" position: relative; right: 10%; !important; margin-right:-10px" width="350px"
                    src="https://veinlab.net/storage/company_info/اللوغو_page-0001.jpg" class="" />

            </div>

            <!--begin::Section-->
            <div>
                <div>
                    <!--begin::Order details-->
                    <div id="result_information">
                        <div id="text-header-info">

                            <div>

                                <div style="display:inline-block;">
                                
                                    <span> الجنس  : </span>
                                    <span>{{$result->patient->gender == "female" ? 'ذكر' :  'انثي'}}</span>


                                </div>

                                <div style="display:inline-block;">
                                    <span>العمر : </span>
                                    <span>{{$result->patient->ageCalculation ?? ''}}</span>
                                </div>


                                <div style="display:inline-block;">
                                    <span>كود المريض : </span>
                                    <span>{{$result->patient->id ?? ''}}</span>

                                </div>


                            </div>

                            <div>

                                <div style="display:inline-block;">
                                    <span>رقم الفاتورة : </span>
                                    <span>{{$result->WaitingLab->Invoice->id  ?? ''}}</span>

                                </div>

                                <div style="display:inline-block;">
                                    <span>تاريخ الفاتورة : </span>
                                    <span>{{$result->WaitingLab->Invoice->created_at->format('d-m-Y') ?? ''}}</span>
                                </div>

                            </div>


                            <div>
                                <div>
                                    <span>تاريخ النتيجة : </span>
                                    <span>{{$result->created_at->format('d-m-Y') ?? ''}}</span>
                                </div>
                            </div>


                            <div>
                                <div>
                                    <span>المركز الطبي : </span>
                                    <span>{{'فين لاب'}}</span>
                                </div>
                            </div>


                        </div>



                        <div id="logo">

                            <div id="image-logo">
                                <img width="200px" src="https://cdn-icons-png.flaticon.com/512/1430/1430453.png" alt="Mainlogo_large"/>
                            </div>

                            <div id="patient_name">
                                <h1>{{$result->patient->name_ar ?? ''}} </h1>
                            </div>


                        </div>


                    </div>
                    <!--end::Order details-->

                    <div id="Analyis_title">
                        <div>
                            <h1 style="font-size:45px; color: #07804a">
                                {{$result->waitingLab->mainAnalysis->general_name  ?? ''}} </h1>
                        </div>
                    </div>

                    <div id="table-contain" dir="rtl">
                        <table style="font-size:20px">

                            <thead>
                                <tr class="text-black-400">
                                    <th class="text-center">اسم الاختبار</th>
                                    <th class="text-center">النتيجة</th>
                                    <th class="text-center">الوحدة</th>
                                    <th class="text-center">المعدل الطبيعي</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td class="text-center" title="{{$result->subAnalysis->name ?? ''}}">
                                        {{$result->subAnalysis->name ?? ''}}</td>
                                    <td class="text-center">{{$result->result}}</td>
                                    <td class="text-center">{!! $result->subAnalysis->unit ?? '' !!}</td>

                                    @if($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'string')
                                    <td class="text-center"
                                        title="{{$result->subAnalysis->normal($invoice->patient->gender ?? '')}}">
                                        {{$result->subAnalysis->normal($invoice->patient->gender ?? '')}}
                                    </td>


                                    @elseif($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'color')
                                    <td class="text-center">
                                        <div
                                            style="background-color: {{$result->subAnalysis->normal($invoice->patient->gender ?? '')}}">
                                            اللون</div>
                                    </td>

                                    @elseif($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'select')
                                    <td class="text-center">
                                        {{__($result->subAnalysis->normal($invoice->patient->gender ?? ''))}}</td>

                                    @else
                                    <td class="text-center">لا يوجد معدل طبيعي </td>
                                    @endif


                                </tr>

                            </tbody>
                        </table>
                    </div>



                    @if($result->waitingLab->mainAnalysis->has_cultivation)

                    <div class="d-flex flex-column mt-4 align-items-start">
                        <h2>Cultivation</h2>
                        <p class="fs-4">On cultivation of the received specimen on the relevant media and after 24 hours
                            of aerobic incubation, and sub-culturing suspicious colonies on selective media, the
                            following was revealed.</p>
                    </div>

                    @if($result->waitingLab->growth_status == 'growth')
                    <div class="text-center p-18 border m-auto fw-bold">
                        {{$result->waitingLab->cultivation}}
                    </div>

                    <div style=" ; text-align: left; margin-top: 20px">
                        <h2>The growth is highly Sensitive to: </h2>
                        <table class="table-bordered text-left fs-2">
                            <tbody>
                                <tr>
                                    @forelse($result->waitingLab->high_sensitive_to as $highSensitiveTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$highSensitiveTo['name']}}</td>
                                    @empty
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="text-align: left; margin-top: 20px">
                        <h2>The growth is Moderate Sensitive to: </h2>
                        <table class="table-bordered text-left" style="font-size: 25px">
                            <tbody>
                                <tr>
                                    @foreach($result->waitingLab->moderate_sensitive_to as $moderateSensitiveTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$moderateSensitiveTo['name']}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style=" ; text-align: left; margin-top: 20px">
                        <h2>The growth is Resistant to: </h2>
                        <table class="table-bordered text-left" style="font-size: 25px">
                            <tbody>
                                <tr>
                                    @foreach($result->waitingLab->resistant_to as $resistantTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$resistantTo['name']}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @endif

                    @if(isset($result->waitingLab->notes->lab_notes))
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row ">
                                <div class="col-lg-12 text-center">
                                    <h4 class="mt-3 mb-3 lab"> الملاحظات </h4>
                                    <p>{!! $result->waitingLab->notes->lab_notes !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <!--end::Portlet-->





    <div id="footer">

        <div id="barcode-signature">


            <div id="signature">

            <!-- <img src="{{asset('storage/Images/Doctors/'.$result->waitingLab->invoice->doctor()->first()->signature)}}"
                width="100" alt="barcode" alt=""> <br>
                 -->

                <h4> {{$result->waitingLab->invoice->doctor()->first()->name ?? ''}} : الدكتور </h4>
            </div>

            <div id="barcode">


                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$result->waitingLab->invoice->barcode', 'QRCODE')}}"
                    alt="barcode" />

            </div>



        </div>


        <div id="contact-info">


            <div id="address">

                <i class="fas fa-map-marker-alt" style=""></i>
                <span>مختبرات فينلاب الطبية الرياض - السلمانية شارع الامير محمد بن عبد
                    العزيز</span>

            </div>


            <div id="number">
                <div>
                    <i class="fas fa-phone" ></i>

                    <span>+966 434 343</span>
                </div>

                <div style="">
                    <i class="fas fa-globe" ></i>

                    <span class="text-danger">www.acl.sa.com</span>

                </div>

                <div style="">
                    <i class="fas fa-envelope" ></i>
                    <span class="text-danger">info@acl.com.sa</span>
                </div>

            </div>


        </div>


</body>

</html>