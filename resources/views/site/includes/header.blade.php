<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    @if(app()->getLocale() == 'ar')
    <title>{{ $settings['site_name_ar'] ?? 'Nephele' }} @yield('title')</title>
    @else
    <title>{{ $settings['site_name_en'] ?? 'Nephele' }} @yield('title')</title>
    @endif
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <meta name="keywords" content="{{ $settings['site_key_words'] ? implode(',', (array_column((json_decode($settings['site_key_words'])), 'value'))) : '' }}" />
     @if(app()->getLocale() == 'ar')
        <meta name="description" content="{{ $settings['site_description_ar'] ?? '' }}">
    @else
        <meta name="description" content="{{ $settings['site_description_en'] ?? '' }}">
    @endif
    {{-- <meta name="description" content="Nephele"> --}}
    <meta name="author" content="Nephele">

    <!-- Favicons -->
    {{-- <link type="image/x-icon" href="{{ $settings['logo']? url($settings['logo']) : url('assets/site/images/logo.jpeg') }}" rel="icon"> --}}

     <script>
        // WebFontConfig = {
        //     google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700' ] }
        // };
        // ( function ( d ) {
        //     var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
        //     wf.src = {{ url('assets/js/webfont.js') }};
        //     wf.async = true;
        //     s.parentNode.insertBefore( wf, s );
        // } )( document );
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/assets/site/css/bootstrap.min.css')}}">


    @if(app()->getLocale() == 'ar')
     <link rel="stylesheet" href="{{ url('/assets/site/css/bootstrap-rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ url('/assets/site/css/style.css') }}">
    {{-- demo3 css --}}
    <link rel="stylesheet" href="{{ url('/assets/site/css/demo3.min.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{url('/assets/site/plugins/select2/css/select2.min.css')}}">
    <!-- Toastr CSS -->
    <link href="{{ url('assets/site/toastr/toastr.min.css') }}" rel=stylesheet type="text/css"/>
    {{-- fontawesome --}}
     <link rel="stylesheet" type="text/css" href="{{ url('/assets/site/vendor/fontawesome-free/css/all.min.css') }}">
     {{-- simple-line-icons --}}
    <link rel="stylesheet" type="text/css"
    href="{{ url('/assets/site/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">

     <!-- Main CSS File -->
    {{-- <link rel="stylesheet" href="{{ url('/assets/site/css/style.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/assets/site/css/custom.css') }}">
    <!-- RTL CSS -->
    @if(app()->getLocale() == 'ar')
     <link rel="stylesheet" href="{{ url('/assets/site/css/style-rtl.css') }}">
    @endif





    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="/assets/site/js/html5shiv.min.js"></script>
        <script src="/assets/site/js/respond.min.js"></script>
    <![endif]-->
    @yield('head')
</head>
