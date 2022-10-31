<?php
    $locale = Session::has('locale') ? Session::get('locale') : app()->getLocale();
    $dir = $locale == 'ar' ? 'rtl' : 'ltr';
?>
<!DOCTYPE html>
<html direction="{{ $dir }}" dir="{{ $dir }}" style="direction: {{ $dir }}">

    @include('admin.includes.header')

    <!--begin::Body-->
    {{-- <body id="kt_body" class="page-loading quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled aside-enabled aside-static" style="background-image: url(/assets/admin/media/bg/bg-10.jpg)"> --}}
    <body id="kt_body" class="page-loading quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled aside-enabled aside-static" >
{{--         <div class="page-loader page-loader-logo">
            <img alt="Logo" class="max-h-75px" src="{{url('/mosaweq-logo.png')}}">
            <div class="spinner spinner-secondary"></div>
        </div> --}}
        <!--begin::Main-->
        @include('admin.includes.mobile_header')
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    @include('admin.includes.navbar_public')
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        
                        @yield('breadcrumb')

                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="d-lg-flex flex-row-fluid">
                                    <div class="content-wrapper flex-row-fluid">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    
                    @include('admin.includes.footer')


                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        

        

        @yield('sticky_toolbar')
        
        @include('admin.includes.scripts')
        
    </body>
    <!--end::Body-->
</html>