@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.admins.index'),
        'menu'      => [
            __('admin.admins.index') => route('admin.admins.index'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.admins.index') }}</span>
        </h3>
        <div class="card-toolbar">
            @if(Auth::user()->can('create-admins'))
                <a href="{{ route('admin.admins.create') }}" class="btn btn-success font-weight-bolder font-size-md">
                {{ __('admin.admins.create') }}</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        {{-- @include('admin.includes.search') --}}
        
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr>
                        <th style="text-align: center;">{{ __('admin.Name') }}</th>
                        <th style="text-align: center;">{{ __('admin.admins.Email') }}</th>
                        <th style="text-align: center;">{{ __('admin.admins.Mobile') }}</th>
                        <th style="text-align: center;">{{ __('admin.admins.Role') }}</th>
                        <th style="text-align: center;">{{ t('Status') }}</th>
                        {{-- <th style="text-align: center;">{{ __('admin.admins.Image') }}</th> --}}
                        <th style="text-align: center;">{{ __('admin.Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index=>$admin)
                        <tr>
                            <td style="text-align: center;">
                                {{ $admin->name }}
                            </td>
                            <td style="text-align: center;">
                                {{ $admin->email }}
                            </td>
                            <td style="text-align: center;">
                                {{ $admin->mobile }}
                            </td>
                            <td style="text-align: center;">
                                
                                {{ $admin->roles()->first()['display_name'] }}
                            </td>
                            {{-- <td style="text-align: center;vertical-align: middle;">
                                @if($admin->image)
                                    
                                <img width="100px" height="100px" src="{{ url('/uploads/user_media/'. $admin->image) }}" alt="">

                                @endif
                            </td> --}}
                            <td style="text-align: center;">
                                
                               {{ $admin->active ? t('active') :  t('Blocked') }}
                            </td>
                            <td style="text-align: center;width: 160px;">
                                    {{-- 'show'      => route('admin.admins.show', $admin->id), --}}
                                    @if($admin->id == 1 && Auth::user()->can('edit-admins'))
                                        <a href="{{ route('admin.admins.edit', $admin->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" title="Edit">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    @else
                                    @include('admin.includes.actions', [
                                        'edit'      => route('admin.admins.edit', $admin->id),
                                        'destroy'   => route('admin.admins.destroy', $admin->id),
                                        'permission'=> 'admins'
                                    ])
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $admins->appends(request()->query())->links() }}
</div>
@endsection