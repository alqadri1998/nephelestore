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
    <div class="row">
        <div class="col-xl-12">
            <!--begin::List Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">{{ __('admin.Show') }}</h3>
                    {{-- <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    @if(Auth::user()->can('edit-users'))
                                        <li class="navi-item">
                                            <a href="{{ route('admin.users.edit', $item->id) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-pen text-primary"></i>
                                                </span>
                                                <span class="navi-text">Edit</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->can('delete-users'))
                                    <li class="navi-item">
                                        <a class="navi-link" onclick="$('.deleteForm').submit()" style="cursor: pointer;">
                                            <span class="navi-icon">
                                                <i class="flaticon-delete text-danger"></i>
                                            </span>
                                            <span class="navi-text">{{ __('admin.Delete') }}</span>
                                        </a>
                                        <form method="post" class="deleteForm" action="{{ route('admin.users.destroy', $item->id) }}" style="display: inline;" title="Delete">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                        </form>
                                    </li>
                                    @endif
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Symbol-->
                        @if($item->image)
                        <div class="symbol symbol-40 symbol-light-success mr-5">
                            <span class="symbol-label">
                                    <img src="{{ url($item->image) }}" style="height: 100%" class="align-self-end" alt="" />
                            </span>
                        </div>
                        @endif
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.Name') }}</a>
                            <span class="text-muted">{{ $item->name }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.admins.Email') }}</a>
                            <span class="text-muted">{{ $item->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.admins.Mobile') }}</a>
                            <span class="text-muted">{{ $item->mobile ?? '-' }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.orders_count') }}</a>
                            <span class="text-muted">{{ $item->orders->count() }}</span>
                        </div>
                    </div>
                    <!--end::Item-->
                <!--end::Body-->
            </div>
            <!--end::List Widget 3-->
        </div>
    </div>
@endsection