<?php
    $authUser = Auth::user();
?>
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-3">
            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="#">
                    <img alt="Logo" src="{{ url('assets/site/img/logo.jpeg') }}" class="logo-default max-h-100px">
                    <img alt="Logo" src="{{ url('assets/site/img/logo.jpeg') }}" class="logo-sticky max-h-100px">
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Header Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <!--begin::Header Menu-->
                <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                    <!--begin::Header Nav-->
                    
                    <!--end::Header Nav-->
                </div>
                <!--end::Header Menu-->
            </div>
            <!--end::Header Menu Wrapper-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
        <div class="topbar">

            <!--begin::Search-->

            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        @if($locale == 'ar')
                        {{-- <img class="h-20px w-20px rounded-sm" src="/assets/admin/media/svg/flags/008-saudi-arabia.svg" alt="" /> --}}
                        <span class="primary-color-dark">AR</span>
                        @else
                        {{-- <img class="h-20px w-20px rounded-sm" src="/assets/admin/media/svg/flags/226-united-states.svg" alt="" /> --}}
                        <span class="primary-color-dark">EN</span>
                        @endif
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <li class="navi-item {{$locale == 'ar' ? '' : 'active'}}">
                            <a href="{{ route('admin.changeLang', 'en') }}" class="navi-link">
                                <span class="navi-text">{{ __('EN') }}</span>
                            </a>
                        </li>
                        <li class="navi-item {{$locale == 'ar' ? 'active' : ''}}">
                            <a href="{{ route('admin.changeLang', 'ar') }}" class="navi-link">
                                <span class="navi-text">{{ __('AR') }}</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Nav-->
                </div>
                    
                <!--end::Dropdown-->
            </div>
            <div class="dropdown">
                <div class="topbar-item" data-offset="10px,0px">
                    <a href="{{ route('admin.showLoginForm') }}" class="btn btn-login font-weight-bold py-3 px-6 mr-2">{{ t('login') }}</a>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>