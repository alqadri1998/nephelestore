<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Title-->
                <h2 class="primary-color-dark font-weight-bold my-2 mr-5">{{ isset($title) ? $title : '' }}</h2>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <div class="d-flex align-items-center font-weight-bold my-2">
                    <!--begin::Item-->
                    <a href="#" class="opacity-75 hover-opacity-100">
                        <i class="flaticon2-shelter primary-color-dark icon-1x"></i>
                    </a>
                    <!--end::Item-->
                    @if(isset($menu) && count($menu) > 0)
                        @foreach($menu as $title => $route)
                            <!--begin::Item-->
                            <span class="label label-dot label-sm primary-bg-color-dark opacity-75 mx-3"></span>
                            <a href="{{ $route }}" class="primary-color-dark text-hover-white opacity-75 hover-opacity-100">{{ $title }}</a>
                            <!--end::Item-->
                        @endforeach
                    @endif
                </div>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            
            <!--end::Button-->
            <!--begin::Dropdown-->
            {{-- <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Quick actions">
                <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quick Actions</a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    <ul class="navi navi-hover py-5">
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-drop"></i>
                                </span>
                                <span class="navi-text">Action 1</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-list-3"></i>
                                </span>
                                <span class="navi-text">Action 2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
        <!--end::Toolbar-->
    </div>
</div>
