<?php
    $logo = \App\Setting::where('key', 'logo')->first()['value'];
    $locale = app()->getLocale();
    $newLang = $locale == 'ar' ? 'en' : 'ar';
    $authUser = Auth::user();

?>
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-3">
            <!--begin::Header Logo-->
{{--             <div class="header-logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img alt="Logo" src="{{ $settings['logo']? url($settings['logo']) : url('assets/site/img/logo.png') }}" class="logo-default max-h-100px">
                    <img alt="Logo" src="{{ $settings['logo']? url($settings['logo']) : url('assets/site/img/logo.png') }}" class="logo-sticky max-h-100px">
                </a>
            </div> --}}
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
            <!--begin::Languages-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                        @if($locale == 'ar')
                        {{t('Arabic','site')}}
                        @else
                        {{t('English','site')}}
                        @endif
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown lang-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        <li class="navi-item active">
                            <a href="{{ route('admin.changeLang', 'en') }}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    
                                </span>
                                <span class="navi-text">{{t('English','site')}}</span>
                            </a>
                        </li>
                        <li class="navi-item active">
                            <a href="{{ route('admin.changeLang', 'ar') }}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                               
                                </span>
                                <span class="navi-text"> {{t('Arabic','site')}}</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->
            <!--begin::Search-->
            <div class="dropdown">
                <!--begin::Toggle-->
                {{-- <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:/assets/admin/media/svg/icons/General/Search.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                </div> --}}
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                {{-- <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                        <!--begin:Form-->
                        <form method="get" class="quick-search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:/assets/admin/media/svg/icons/General/Search.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search..." value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" name="search">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                        <!--begin::Scroll-->
                        <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="325" data-mobile-height="200" style="height: 325px; overflow: hidden;"><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        <!--end::Scroll-->
                    </div>
                </div> --}}
                <!--end::Dropdown-->
            </div>
            <!--end::Search-->
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                {{-- <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon  btn-dropdown btn-lg mr-1">
                        <div class="h-20px w-20px rounded-sm notifications-container">
    
                        <i class="flaticon2-notification text-white"></i>
                        </div>
                    </div>
                </div> --}}
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(/assets/admin/media/bg/bg-11.jpg)">
                            <!--begin::Title-->
                            <h4 class="d-flex flex-center rounded-top">
                                <span class="text-white">{{t('User Notifications')}}</span>
                                {{-- <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{ count($notifications) }} {{t('new notification')}}</span> --}}
                            </h4>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            
                            <!--end::Tabpane-->
                            <!--begin::Tabpane-->
                            <div class="tab-pane active show" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <!--begin::Item-->
                                    {{-- @foreach($notifications as $noty)
                                    <a href="javascript:void(0)" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-text">
                                                <div class="font-weight-bold">{{ $noty->body }}</div>
                                                <div class="text-muted">{{ get_time_ago(strtotime($noty->created_at)) }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route(current_guard() . '.mark_as_read', $noty->id) }}" class="navi-link" style="width: 100%;text-align: {{ app()->getLocale() == 'ar' ? 'left' : 'right' }};display: block;padding: 0 20px;">{{ t('mark as read') }}</a>
                                    <hr>
                                    @endforeach --}}
                   {{--                  @if(count($notifications) == 0)
                                    <div class="d-flex flex-center text-center text-muted min-h-200px"><br>{{t('No new notifications')}}</div>
                                    @endif --}}
                                
                                </div>
                                <div class="btn text-center" style="width: 100%;">
                                    {{-- <a href="{{ route(current_guard() . '.mark_all_as_read', $current_guard) }}" class="navi-link">{{ t('Make All As Read')}}</a> --}}
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                            <!--begin::Tabpane-->
                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                <!--begin::Nav-->
                                
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Notifications-->
            <!--begin::Quick Actions-->
            
            <!--end::Quick Actions-->
            <!--begin::User-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item">
                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
                        <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ ucfirst($authUser->name) }}</span>
                        <span class="symbol symbol-35">
                            <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">{{ strtoupper(substr($authUser->name, 0,1)) }}</span>
                        </span>
                    </div>
                </div>
                <!--end::Toggle-->
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>