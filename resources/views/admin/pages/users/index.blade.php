@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.users.index'),
        'menu'      => [
            __('admin.users.index') => route('admin.users.index'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.users.index') }}</span>
        </h3>
        <div class="card-toolbar">
            @if(Auth::user()->can('create-users'))
                <a href="{{ route('admin.users.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
                <span class="svg-icon svg-icon-md svg-icon-white">
                </span>{{ __('admin.create') }}</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        @include('admin.includes.search')
        
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">{{ __('admin.Name') }}</th>
                        <th style="text-align: center;">{{ __('admin.admins.Email') }}</th>
                        <th style="text-align: center;">{{ __('admin.admins.Mobile') }}</th>
                        {{-- <th style="text-align: center;">{{ __('admin.status') }}</th> --}}
                        <th style="text-align: center;">{{ __('admin.Options') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index=>$item)
                        <tr>
                            <td style="text-align: center;">
                                {{ $index+1 }}
                            </td>
                            <td style="text-align: center;">
                                {{ $item->name }}
                            </td>
                            <td style="text-align: center;">
                                {{ $item->email }}
                            </td>
                            <td style="text-align: center">
                                {{ $item->mobile }}
                            </td>

                            <td style="text-align: center">
                                 {{ !$item->active ? __('admin.blocked') : __('admin.active') }}
                            </td>
                            
                                        {{-- 'show'      => route('admin.users.show', $item->id), --}}
                            <td style="text-align: center;width: 160px;">
                                    @include('admin.includes.actions', [
                                        'edit'      => route('admin.users.edit', $item->id),
                                        'destroy'   => route('admin.users.destroy', $item->id),
                                        'permission'=> null
                                    ])
                             {{--   @if($item->blocked == 0)
                                    <a href="{{ route('admin.users.block', $item->id) }}" class="btn btn-sm btn-block btn-danger mt-3">
                                        <i class="flaticon-close icon-md" style="color:#333399"></i> {{ __('admin.Blocked') }}
                                    </a>
                                @else
                                    <a href="{{ route('admin.users.activeate', $item->id) }}"class="btn btn-sm btn-block btn-success mt-3"><i class="flaticon-close icon-md" style="color:#333399"></i> {{ __('admin.Activate') }}</a>
                                @endif --}}
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
    {{ $items->appends(request()->query())->links() }}
</div>
@endsection