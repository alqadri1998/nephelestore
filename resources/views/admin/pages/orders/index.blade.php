@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.orders.index'),
        'menu'      => [
            __('admin.orders.index') => route('admin.orders.index'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.orders.index') }}</span>
        </h3>
        <div class="card-toolbar">

        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        @include('admin.includes.search',['search'=>true ,'hasExportAll'=>true])
        <div style="margin-bottom: 40px">
            <hr>
            <h3 style="text-align: center;">
                <span>{{ __('بحث متقدم') }}</span>
            </h3>
            <hr>
            <form action="{{ route('admin.orders.index') }}" style="display: block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>حالة الطلب</label>
                            <select class="form-control select2" id="kt_select2_1" name="status">
                                <option value="pending" {{ isset($_GET['status']) && $_GET['status'] ==  'pending'? 'selected' : '' }}>{{ __('admin.pending') }}</option>
                                <option value="confirmed" {{ isset($_GET['status']) &&$_GET['status'] ==  'confirmed' ? 'selected' : '' }}>{{ __('admin.confirmed') }}</option>

                                  <option value="cancelled" {{ isset($_GET['status']) &&$_GET['status'] ==  'cancelled' ? 'selected' : '' }}>{{ __('admin.cancelled') }}</option>
                            
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>العميل</label>
                            <select class="form-control select2" id="kt_select2_2" name="customer_id">
                                 <option value="">{{ t('select', 'site') }}</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ isset($_GET['customer_id']) && $_GET['customer_id'] ==  $customer->id? 'selected' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }} ({{ $customer->mobile }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('تاريخ الطلب من')}}</label>
                        {{-- data-date-start-date="{{ date('Y-m-d') }}" --}}
                        <input type="text" class="form-control" id="kt_datepicker_1"  readonly="readonly" name="from" value="{{ isset($_GET['from']) ? $_GET['from'] : '' }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('تاريخ الطلب الى')}}</label>
                        {{-- data-date-start-date="{{ date('Y-m-d') }}" --}}
                        <input type="text" class="form-control" id="kt_datepicker_2"  readonly="readonly" name="to" value="{{ isset($_GET['to']) ? $_GET['to'] : '' }}"/>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-success" value="فيلتر">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-warning">الغاء الفلاتر</a>
                    </div>
                </div>
            </form>
        </div>
        <!--begin::Table-->
            @if($items->count() > 0)
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">{{ t('Order Number','site') }}</th>
                            <th style="text-align: center;">{{ t('Product Counts','site') }}</th>
                            <th style="text-align: center;">{{ t('Date','site') }}</th>
                            <th style="text-align: center;">{{ t('Sub Total','site') }}</th>
                            <th style="text-align: center;">{{ t('Payment Method','site') }}</th>
                            <th style="text-align: center;">{{ t('Discount','site') }}</th>
                            <th style="text-align: center;">{{ t('Shipping Price','site') }}</th>
                            <th style="text-align: center;">{{ t('Total','site') }}</th>

                            <th style="text-align: center;">{{ t('Status') }}</th>
                            <th style="text-align: center;">{{ __('admin.Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$status = [
	'pending' => 'warning',
	'paid' => 'primary',
	'waiting_for_shipping' => 'primary',
	'confirmed' => 'success',
	'shipped' => 'success',
	'delivered' => 'success',
	'cancelled' => 'danger',
	'refunded' => 'danger',
	'refund_received' => 'danger',
];

?>
                        @foreach($items as $index=>$item)
                            <tr>
                                <td style="text-align: center;direction: ltr" class="text-primary">
                                    #{{ $item->order_id }}
                                </td>
                                <td style="text-align: center;direction: ltr;">
                                    {{ $item->total_item_count }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->created_at->format('d/m/Y H:i A') }}
                                </td>

                                 <td style="text-align: center;">
                                    {{ number_format($item->sub_total)}} {{ t('SAR') }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->payment_method == 'credit' ? t('credit','site') :t('Pay On Deliverd','site') }}
                                </td>
                                 <td style="text-align: center;">
                                    @if($item->discount > 0)
                                    {{ number_format($item->discount)}} {{ t('SAR') }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td style="text-align: center;">

                                    {{ number_format($item->shipping_price)}} {{ t('SAR') }}

                                </td>
                                <td style="text-align: center;">

                                    {{ number_format($item->total)}} {{ t('SAR') }}

                                </td>
                                <td style="text-align: center;">
                                    <span class="label label-pill label-{{ $status[$item->status] }}" style="width: 80px;height: 50px;border-radius: 7px;font-size: 14px;">@lang('admin.' . $item->status)</span>
                                </td>

                                <td style="text-align: center;">
                                    <div class="dropdown dropdown-inline mr-4">
                                        <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            @if($item->status == 'pending')

                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status',
                                                ['order_id' => $item->id, 'status' => 'confirmed']) }}">
                                                    تأكيد الطلب
                                                </a>
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status',
                                                ['order_id' => $item->id, 'status' => 'cancelled']) }}">
                                                    إلغاء الطلب
                                                </a>

                                            @elseif($item->status == 'waiting_for_shipping')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status',
                                                ['order_id' => $item->id, 'status' => 'shipped']) }}">
                                                    تم الشحن
                                                </a>
                                            @elseif($item->status == 'shipped')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status',
                                                ['order_id' => $item->id, 'status' => 'completed']) }}">
                                                    تم الاستلام
                                                </a>

                                            @elseif($item->status == 'refunded')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status',
                                                ['order_id' => $item->id, 'status' => 'refund_received']) }}">
                                                    تم الاسترجاع
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @include('admin.includes.actions', [
                                        'show'      => route('admin.orders.show', $item->id),
                                        'permission'=> 'orders'
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h2 class="text-center">{{ __('admin.No Data') }}</h2>
            @endif

        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $items->appends(request()->query())->links() }}
</div>
@endsection