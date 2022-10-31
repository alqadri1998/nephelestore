<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
        <h3 class="font-weight-bold m-0 text-white">My Account 
        <small class="text-muted font-size-sm ml-2"></small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <?php
                    $imagePath = url('/assets/admin/media/users/300_21.jpg');
                    if(Auth::user()->image){
                        $imagePath = url('/uploads/user_media/'. Auth::user()->image);
                    }
                ?>
                <div class="symbol-label" style="background-image:url({{ $imagePath }})"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-white">{{ Auth::user()->name }}</a>
                @if(Auth::user()->roles)
                    <div class="text-muted mt-1">{{ Auth::user()->roles->first()->name }}</div>
                @endif
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                    
                    <a href="{{ route('admin.profile') }}" class="btn btn-sm btn-success font-weight-bolder py-2 px-5">{{t('Profile')}}</a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-success font-weight-bolder py-2 px-5">{{t('Logout')}}</a>
                </div>
            </div>
        </div>
        <!--end::Header-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel