<?php
    $settings = \App\Setting::pluck('value', 'key')->toArray();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" type="text/css" href="../../public/css/prints.css"> -->
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
        body,html {
            vertical-align: middle;
            font-size: 14px;
            letter-spacing: normal;
        }

        .table {
            width: 100%;
            margin: auto;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10px;
            vertical-align: middle;
        }


        .tr {
            /*height: 50px;*/
            border: 1px solid black;
            vertical-align: middle;
            width: 100%;
        }
        .td {
            /*height: 50px;*/
            vertical-align: middle;
            border: 1px solid black;
            text-align: center;
            padding: 5px;
            font-size: 12px;
            width: 25%;
        }
        .right {
            float: right;
            direction: rtl;
            text-align: right;
        }
        .center{
            margin: auto;
            text-align: center;
        }

        .no-margin{
            margin-bottom: 0 !important;
            margin-top: 0 !important;
        }

        .printed_by{
            font-size: 10px;
            color:gray;

        }

        .span {
            margin: 10px !important;
        }
        .text-right{
            direction: rtl !important
        }

        

    </style>
  
</head>
<body>
<htmlpageheader name="page-header">
    <table class="center">
        <tr>
            <td style="text-align: center; width: 33%;">
                <img src="{{ $settings['logo'] }}" height="75" width="75">
                <p><h2> {{ $settings['site_name_ar'] }}</h2></p>
            </td>
        </tr>
    </table>
    <hr>
</htmlpageheader>
<div>
    <h2 class="center">بيانات العميل</h2>
    <br>
    <div class="right">
        <p class="right no-margin" style="display:block"><span class="span"> <b>الاسم: </b> aa</span> </p>
        <p class="right no-margin" style="display:block"><span class="span"> <b>العنوان: </b> aa</span></p>
       <p class="right no-margin" style="display:block"> <span class="span"> <b>البريد الالكترونى:</b> aa</span></p>
       <p class="right no-margin" style="display:block"> <span class="span"> <b>الجوال:</b> aa</span></p>
    </div>
    <hr/>
    <h2 class="center">بيانات الطلب</h2>
    <br>
     <div class="right">
        <p class="right no-margin"><b>تاريخ:</b> dd</p>
        <p class="right no-margin"><b>حالة الطلب:</b> dd </p>
    </div>
    <hr/>
{{--     <div class="right">
        <h2 class="right">INVOICE <span>#{{ $order->order_num }}</span></h2>
        <h2 class="right">اجمالى المدفوع :
            <span>{{ number_format($order->sub_total, 2) }} ريال سعودى</span>
        </h2>
    </div> --}}
    <br/>
    <br/>
    <div class="right">
        <table class="table" repeat_header="1">
            <thead>
                <tr class="tr right">
                    <th class="td right">المنتج</th>
                    <th class="td right">الكمية</th>
                     <th class="td right">السعر</th>
                    <th class="td right">الاجمالى</th>
                </tr>
            </thead>
            <tbody>
                    <tr class="tr right">
                        <td class="td right">
                            <h6>name</h6>
                            <p>desc </p>
                        </td>
                        <td class="td right">q</td>
                        <td class="td right">price</td>
                        <td class="td right">ss</td>
                    </tr>

            </tbody>
        </table>
    </div>
    <br>
    <br>
     <div class="right">
        <p class="right no-margin text-right"><b>مجموع المنتجات:</b> dd</p>
        <p class="right no-margin text-right"><b>الخصم:</b> gg </p>
        <p class="right no-margin text-right"><b>الضريبة:</b> hh </p>
        <p class="right no-margin text-right"><b>الإجمالى:</b> jj </p>
    </div>

<htmlpagefooter name="page-footer">
    <div class="center">
        <h5 class="center printed_by"><b>تم طباعة هذه الفاتورة بتاريخ: </b> {{ date('d/m/Y') }}</h5> 
        <h5 class="center printed_by"><b>جميع الحقوق محفوظة لشركة مسالم</b></h5>
    </div>
</htmlpagefooter>



</body>
</html>
