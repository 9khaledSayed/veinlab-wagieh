<!DOCTYPE html>
<html lang="ar" >

<head>
    <meta charset="UTF-8">
    <title>فاتورة</title>
    <style>
        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }
        .invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
        }
        .invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }
        .invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }
        .invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }
        .invoice-POS h2 {
            font-size: .9em;
        }
        .invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        .invoice-POS p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }
        .invoice-POS .top, .invoice-POS .mid, .invoice-POS .bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }
        .invoice-POS .top {
            min-height: 100px;
        }
        .invoice-POS .mid {
            min-height: 80px;
        }
        .invoice-POS .bot {
            min-height: 50px;
        }
        .invoice-POS .top .logo {
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }
        .invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }
        .invoice-POS .info {
            display: block;
            margin-left: 0;
        }
        .invoice-POS .title {
            float: right;
        }
        .invoice-POS .title p {
            text-align: right;
        }
        .invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-POS .tabletitle {
            font-size: .5em;
            background: #EEE;
        }
        .invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }
        .invoice-POS .item {
            width: 24mm;
        }
        .invoice-POS .itemtext {
            font-size: .5em;
        }
        .invoice-POS #legalcopy {
            margin-top: 5mm;
        }
        .tab {
            padding: 1px 8px;
            border: 1px rgb(224, 210, 210);
            border-radius: 4px;
            border-style: dotted;

        }
        .text-right {
            text-align: right !important
        }
        .text-left {
            text-align: left !important
        }
        .text-center {
            text-align: center !important
        }
        .fz {
            font-size: 10px;
        }
        .row {
            --bs-gutter-x: 0.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x))
        }
        .row > * {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y)
        }
        b {
            font-size: 8px;
        }
    </style>
    <script>
        window.console = window.console || function(t) {};
    </script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>
<body translate="no" dir="rtl">
<div class="invoice-POS">
    <center class="top">
    <div class="logo"></div>
    <div class="info">
        <h2>مختبرات فين الطبيه</h2>
    </div><!--End Info-->

    </center>
    <div class="mid">
        <div class="info">
            <p class="tab text-center">فاتورة ضريبية مبسطه</p>
            <p class="tab">رقم الفاتوره:</p>
            <p>
                <b>الاسم</b>: محمد محمد محمد <br>
                <b>العنوان</b>: شارع المدينه منطقه 00000<br>
                <b>البريد الالكتروني</b>: JohnDoe@gmail.com<br>
                <b>الهاتف</b>: 555-555-5555<br>
                <b>التاريخ</b>: 08/02/2023<br>
            </p>
            <p class="tab" style="font-size: 6px;">رقم تسجيل ضريبية القيمة المضافه:</p>
        </div>
    </div><!--End Invoice Mid-->

    <div class="bot">

        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>اسم الخدمه</h2></td>
                    <td class="Rate text-left"><h2>السعر</h2></td>
                </tr>



                <tr class="service">
                    <td class="tableitem"><p class="itemtext">RT10</p></td>
                    <td class="tableitem text-left"><p class="itemtext">375.00</p></td>
                </tr>





                <tr class="tabletitle">
                    <td class="Rate"><h2>المجموع شامل ضريبية القيمة المضافه(ريال)</h2></td>
                    <td class="payment text-left"><h2>419.25</h2></td>
                </tr>

                <tr class="tabletitle">
                    <td class="Rate"><h2>ضريبية القيمة المضافه</h2></td>
                    <td class="payment text-left"><h2>15%</h2></td>
                </tr>

            </table>
        </div><!--End Table-->

        <br>

        <div id="table">
            <table class="text-left tab ">

                <tr style="font-size: .5em;">
                    <td class="Rate"><h2>S.R</h2></td>
                    <td class="Rate"><h2>40</h2></td>
                    <td class="item"><h2>Total with Vat</h2></td>
                </tr>

                <tr style="font-size: .5em;">
                    <td class="Rate"><h2>S.R</h2></td>
                    <td class="Rate"><h2>10</h2></td>
                    <td class="item"><h2>Vat Value </h2></td>
                </tr>


                <tr style="font-size: .5em;">
                    <td class="Rate"><h2>S.R</h2></td>
                    <td class="Rate"><h2>40</h2></td>
                    <td class="item"><h2>Paid </h2></td>
                </tr>


                <tr style="font-size: .5em;">
                    <td class="Rate"><h2>S.R</h2></td>
                    <td class="Rate"><h2>40</h2></td>
                    <td class="item"><h2>Remaining </h2></td>
                </tr>

            </table>
            <p style="font-size: 7px;">
                Print On 11/02/2023 12:41PM
            </p>
        </div><!--End Table-->
    </div><!--End InvoiceBot-->

</div><!--End Invoice-->

</body>
</html>
