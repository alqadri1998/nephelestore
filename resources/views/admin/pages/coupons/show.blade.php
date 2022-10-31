@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.brands.index'),
        'menu'      => [
            __('admin.brands.index') => route('admin.brands.index'),
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
                    <h3 class="card-title font-weight-bolder text-dark">عرض</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">خيارات</a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="{{ route('admin.brands.edit', $item->id) }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-pen text-primary"></i>
                                            </span>
                                            <span class="navi-text">تعديل</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" onclick="$('.deleteForm').submit()" style="cursor: pointer;">
                                            <span class="navi-icon">
                                                <i class="flaticon-delete text-danger"></i>
                                            </span>
                                            <span class="navi-text">حذف</span>
                                        </a>
                                        <form method="post" class="deleteForm" action="{{ route('admin.brands.destroy', $item->id) }}" style="display: inline;" title="حذف">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                        </form>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.coupon') }}</a>
                            <span class="text-muted">{{ $item->coupon }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.value') }}</a>
                            <span class="text-muted">{{ $item->type == 'percentage' ? $item->value . '%' :  $item->value .' '. __('admin.SAR') }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.category') }}</a>
                            <span class="text-muted">{{ $item->category ? $item->category->translate('ar')->name : '' }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.employee') }}</a>
                            <span class="text-muted">{{ $item->employee ?? '' }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.used_counts') }}</a>
                            <span class="text-muted">{{ '-' }}</span>
                        </div>
                    </div>
                    
                <!--end::Body-->
            </div>
            <!--end::List Widget 3-->
        </div>
    </div>
@endsection