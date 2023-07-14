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
        padding: 0;
        font: 62.5%/1.5;
        width: 100%;
        font-family: 'Cairo';
    }


    #invoice {
        margin: 0 5pt;
        width: 100%;
        padding: 10px 10px;
        margin: 1em auto;
        clear: both;
        position: relative;
        background: #fff
    }


    #result_information {
        width: 100%;
        margin: 50px 10%;
        display: inline-block;
        box-sizing: border-box
    }

    #logo {
        padding: 5px;
        display: inline-block;
        position: relative;
        top: -24px;
        width: 50%
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
        overflow-wrap: break-word
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

    #table-contain table tr th {
        font-size: 20px !important;
        padding-bottom: 20px !important;
        font-weight: normal;

    }

    #table-contain table tr td {
        font-size: 15px !important;
       

    }

    #table-contain table tr td,
    th {
        width: 15% !important;
        text-align: center;

    }


    #footer {
        width: 100%;
        border-bottom: 40px solid #07804a;
        position: fixed;
        top: 900px;
        font-size: 18px !important;
        padding-bottom: 20px !important;
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
        color: #07804a;
        line-height: 26px;
        font-size: 18px !important;
    }

    #footer #address i {
        position: relative;
        right: 40px;
        top: 20px;
        font-size: 18px !important;
    }

    #footer #number {
        display: inline-block;
        position: relative;
        top: 10px;
        color: #07804a;
        font-size: 18px !important;
    }


    #footer #number div {
        margin: 8px;
    }


    #footer #number i {
        padding-right: 8px;
        color: white;
        background-color: #07804a;
        padding: 5px;
        font-size: 18px !important;
        margin-top: 10px !important;
        border-radius: 50%;
    }


    #footer #barcode-signature {
        float: right;
        margin-right: 5%;
        position: relative;
        top: 250px;
    }

    #footer #barcode {
        display: inline-block;
    }

    #footer #signature {
        display: inline-block;
        position: relative;
        padding-right: 41px;
    }

    </style>
</head>

<body>




    <!--begin::Portlet-->
    <div id="invoice">

        <div>

            <div>
                <img alt="Logo" class="" dir="rtl"
                    style=" position: relative; right: 1%; !important; margin-right:-10px" width="350px"
                    src="https://veinlab.net/storage/company_info/اللوغو_page-0001.jpg" class="" />
            </div>

            <!--begin::Section-->
            <div>
                <div>
                <h3 style="text-align:center"> {{$patient->name_ar}} : اسم المريض  </h3>

                </div>
                <div>
                    
                    <div id="table-contain" dir="rtl">
                        <table style="font-size:20px">
                            <thead>
                                <tr class="text-black-400">
                                    <th class="text-center">#</th>
                                    <th class="">{{ __('Analyse') }}</th>
                                    <th class="">{{ __('Amount Paid') }}</th>
                                    <th class="">{{ __('Total Price') }}</th>
                                    <th class="">{{ __('Payment Method') }}</th>
                                    <th class="">{{ __('Approved') }}</th>
                                    <th class="">{{ __('Date') }}</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse( $patient->invoice as $invoice)

                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>

                                    <td class="text-center">
                                        @forelse($invoice->main_analysis as $mainAnalysis)
                                        <span class="text-center">{{$mainAnalysis["name"]}}</span> <br>
                                        @empty
                                        @endforelse
                                    </td>

                                    <td class="text-center">{{ $invoice->amount_paid }}</td>
                                    <td class="text-center">{{ $invoice->total_price }}</td>

                                    <td class="text-center">
                                        <span> <strong> {{__('Payment Method')}} : </strong>
                                            {{ $invoice->pay_method == 1 ? __('Cash') : __('Credit') }}</span> <br>
                                        @if($invoice->pay_method == 2)
                                        <span> <strong> {{__('Payment Type')}} : </strong>
                                            @if($invoice->payment_type == 1 )
                                            TAMARA
                                            @elseif($invoice->payment_type == 2 )
                                            TAP
                                            @else
                                            MADA

                                            @endif
                                        </span>

                                        @endif
                                    </td>


                                    <td class="text-center">
                                        <span> @if ($invoice->approved_date !== null) <strong
                                                style="color:#50cd89">Approved</strong> @else <strong
                                                style="color:#ee044c">Not Approved</strong> @endif </span>
                                    </td>

                                    <td class="text-center">
                                        <span>{{  $invoice->created_at->format('d-m-Y')}}</span>
                                    </td>

                                </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--end::Portlet-->





    <div id="footer">

        <div id="barcode-signature">


            <div id="signature">

               
                <h4> {{$invoice->doctor()->first()->name ?? ''}} : الدكتور </h4>
            </div>

            <div id="barcode">


                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('$invoice->barcode', 'QRCODE')}}"
                    alt="barcode" />

            </div>


        </div>


        <div id="contact-info">


            <div id="address">

                <i class="fas fa-map-marker-alt"></i>
                <span>مختبرات فينلاب الطبية الرياض - السلمانية شارع الامير محمد بن عبد
                    العزيز</span>

            </div>


            <div id="number">
                <div>
                    <i class="fas fa-phone" style=""></i>
                    <span>{{settings()->get('phone')}}</span>
                </div>

                <div style="">
                    <i class="fas fa-globe" style=""></i>

                    <span class="text-danger">{{settings()->get('site')}}</span>

                </div>

                <div style="">
                    <i class="fas fa-envelope" style=""></i>
                    <span class="text-danger">{{settings()->get('email')}}</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>