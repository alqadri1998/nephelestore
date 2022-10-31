<?php
    $logo = \App\Setting::where('key', 'logo')->first()['value'];
    $prefix = '';
    $settings = \App\Setting::pluck('value', 'key')->toArray();
    $locale = Session::has('locale') ? Session::get('locale') : app()->getLocale();
    if($locale == 'ar'){
        $prefix = '.rtl';
    }
?>
<!--begin::Head-->
    <head><base href="../../">
        <meta charset="utf-8" />
        <title>{{ $settings['site_name_en'] ?? 'Nephele' }}</title>
        <meta name="description" content="Page with empty content" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="{{ url('/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle' . $prefix . '.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ url('/assets/admin/plugins/global/plugins.bundle' . $prefix . '.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/admin/plugins/custom/prismjs/prismjs.bundle' . $prefix . '.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/admin/css/style.bundle' . $prefix . '.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="{{ url('/assets/admin/css/pages/wizard/wizard-1' . $prefix . '.css') }}" rel="stylesheet" type="text/css" />
        {{-- cutom style --}}
        <link href="{{ url('/assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
        @if($locale == 'ar')
            <link href="{{ url('/assets/admin/css/rtl.css') }}" rel="stylesheet" type="text/css" />
        @endif
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{ $logo ? url($logo) : url('/assets/site/img/logo.jpeg') }}" />
        <style>
            .admin-pagination{
                background-color: white;
            }
            .admin-pagination .pagination{
                justify-content: center;
                padding: 10px;
            }
            select.form-control{
                padding: 0 10px !important;
            }
            td .fv-plugins-message-container{
                text-align: right !important;
            }
            .fa{
                font-family: "Font Awesome 5 Free" !important
            }
            .la{
                font-family:'Line Awesome Free' !important;
                direction: ltr !important
            }
            .half-width{
                width: 50% !important;
            }
            .square{
                width: 25px;
                height: 25px;
                margin: 0 auto;
            }
            .flaticon2-copy{
                cursor: pointer !important;
            }
            *{
                letter-spacing: 0 !important;
            }

        </style>
        @yield('head')
    </head>
    <!--end::Head-->