<?php
    $logo = \App\Setting::where('key', 'logo')->first()['value'];
    $items = config('sidebar');
    //dd($items);
?>
<!--begin::Aside-->
<div class="aside aside-left d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                {{-- @if(Auth::user()->can('list-roles')) --}}
                    @include('admin.includes.sidebar_item', [
                        'title'     => __('dashboard'),
                        'route'     => 'admin.dashboard',
                        'icon'      => 'menu-icon flaticon-home',
                        'type'      => 'single',
                        'childs'    => [],
                    ])
                {{-- @endif --}}

                <li class="menu-section">
                    <h4 class="menu-text">{{ t('Control Pages') }}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                @foreach($items as $item)
                    @if(Auth::user()->can($item['permission']) || $item['permission'] == null)
                        @include('admin.includes.sidebar_item', [
                            'title'     => $item['title'],
                            'route'     => $item['route'],
                            'icon'      => $item['icon'],
                            'type'      => $item['type'],
                            'childs'    => $item['childs'],
                        ])
                    @endif
                @endforeach

                <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('home') }}" class="menu-link">
                        <i class="menu-icon flaticon-reply"></i>
                        <span class="menu-text">{{ __('admin.backtoHome') }}</span>
                    </a>
                </li>

            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
