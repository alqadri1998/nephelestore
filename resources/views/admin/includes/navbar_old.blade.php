<?php
    $authUser = Auth::user();
?>
<!--begin::Header-->
<div id="kt_header" class="header header-fixed noprint">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                        <!--begin::Header Menu-->
        @include('admin.includes.shortcuts')
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
    <div class="dropdown">
    <!--begin::Toggle-->
    <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px" aria-expanded="false">
        <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
            <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ $authUser->name }}</span>
            <span class="symbol symbol-35 symbol-light-success">
                <span class="symbol-label font-size-h5 font-weight-bold">{{ ucfirst(substr($authUser->name, 0, 1)) }}</span>
            </span>
        </div>
    </div>
    <!--end::Toggle-->
    <!--begin::Dropdown-->
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0" style="">
        <!--begin::Header-->
        <?php
            $imagePath = url('/assets/admin/media/users/300_21.jpg');
            if($authUser->image){
                $imagePath = url('/uploads/user_media/'. $authUser->image);
            }
        ?>
        <div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url(/assets/admin/media/misc/bg-1.jpg)">
            <div class="d-flex align-items-center mr-2">
                <!--begin::Symbol-->
                <div class="symbol bg-white-o-15 mr-3">
                    <span class="symbol-label text-success font-weight-bold font-size-h4" style="background-image: url({{ url($imagePath) }})"></span>
                </div>
                <!--end::Symbol-->
                <!--begin::Text-->
                <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ $authUser->name }} {{ $authUser->role() }}</div>
                <!--end::Text-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 pt-5">
            <!--begin::Item-->
            <a href="{{ route('admin.profile') }}" class="navi-item px-8">
                <div class="navi-link">
                    <div class="navi-icon mr-2">
                        <i class="flaticon2-calendar-3 text-success"></i>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{ __('admin.Profile') }}</div>
                    </div>
                </div>
            </a>
            <!--end::Item-->
            <!--begin::Footer-->
            {{-- <div class="navi-separator mt-3"></div> --}}
            <div class="navi-footer px-8 py-5" style="justify-content: center;">
                <a href="{{ route('admin.logout') }}" class="btn btn-light-primary font-weight-bold">{{ __('admin.Sign Out') }}</a>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Dropdown-->
        </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->


