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
    <div class="center">
        @if(isset($title))
            <h2>{{ __('admin.' . $title) }}</h2>
        @endif
    </div>
    <div class="right">
        <table class="table" repeat_header="1">
            <thead>
                <tr class="tr right">
                        <th class="td right">#</th>
                    @foreach($headers as $headerItem)
                        <th class="td right">{{ $headerItem }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                    @foreach($items as $index => $item)
                        <tr class="tr right">
                                <td class="td right">{{ $index + 1 }}</td>
                            @foreach($headers as $headerItem)
                                <td class="td right">{!! $item[$headerItem] !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    @if(count($sums) > 0)
                        <tr class="tr right">
                                <td class="td right">{{ t('Total','site') }}</td>
                            @foreach($headers as $headerItem)
                                <td class="td right">{!! $sums[$headerItem] !!}</td>
                            @endforeach
                        </tr>
                    @endif

            </tbody>
        </table>
    </div>
    <br>
    <br>

<htmlpagefooter name="page-footer">
    <div class="center text-right">
        <h5 class="center printed_by"><b>تم طباعته فى: </b> {{ date('d/m/Y H:i A') }}</h5> 
        <h5 class="center printed_by"><b>جميع الحقوق محفوظة {{ $settings['site_name_ar'] }}</b></h5>
    </div>
</htmlpagefooter>



</body>
</html>
