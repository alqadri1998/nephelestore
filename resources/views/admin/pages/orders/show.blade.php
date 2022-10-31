@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.orders.show'),
        'menu'      => [
            __('admin.orders.show') => route('admin.orders.show', $item->id),
        ],
    ])
@endsection

@section('content')
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">
                            {{ t('Order Details','site') }}</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <!--begin::Logo-->
                                <a href="#" class="mb-5">
                                    <img src="assets/media/logos/logo-dark.png" alt="" />
                                </a>
                                
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success">{{ __('admin.' . $item->status) }}</button>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            @if($item->status == 'pending')
                                                
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status', 
                                                ['order_id' => $item->id, 'status' => 'cancelled']) }}">
                                                    {{ t('Cancel Order','site') }}
                                                </a>
                                           
                                            @elseif($item->status == 'waiting_for_shipping')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status', 
                                                ['order_id' => $item->id, 'status' => 'shipped']) }}">
                                                    {{ t('Order Shipped','site') }}
                                                </a>
                                           
                                            {{-- @elseif($item->status == 'completed')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status', 
                                                ['order_id' => $item->id, 'status' => 'refunded']) }}">
                                                    طلب استرجاع
                                                </a> --}}
                                            {{-- @elseif($item->status == 'refunded')
                                                <a class="dropdown-item" href="
                                                {{ route('admin.order.change_status', 
                                                ['order_id' => $item->id, 'status' => 'refund_received']) }}">
                                                    تم الاسترجاع
                                                </a> --}}
                                            @endif
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{{ t('Date','site') }}</span>
                                <span class="opacity-70">{{ $item->created_at->format('d/m/Y H:i A') }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{{ t('Order Number','site') }}</span>
                                <span class="text-primary ">#{{ $item->order_id }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{{ t('Order Info','site') }}</span>
                                <span class="opacity-70">
                                    {{ $item->name }}
                                <br />
                                    {{ $item->mobile }}
                                <br />
                                    {{ $item->street_address }}
                                <br />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                <!-- begin: Invoice body-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-left text-uppercase">
                                            {{ t('Product','site') }}
                                        </th>
                                        <th class="pl-0 font-weight-bold text-center text-uppercase">
                                            {{ t('Size/Color','site') }}
                                        </th>
                                        <th class="text-center font-weight-bold text-muted text-uppercase">
                                            {{ t('Quantity','site') }}
                                        </th>
                                        <th class="text-center font-weight-bold text-muted text-uppercase">
                                            {{ t('Price','site') }}
                                        </th>
                                        <th class="text-center pr-0 font-weight-bold text-muted text-uppercase">
                                            {{ t('Total','site') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($item->products as $product)
                                    <tr class="font-weight-boldest">
                                        <td class="border-0 pl-0 pt-7 d-flex align-items-center text-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light text-center">
                                            <div class="symbol-label" style="background-image: url('{{ $product->parent?$product->parent->getFirstMedia('thumb')->getFullUrl() : $product->getFirstMedia('thumb')->getFullUrl() }}')"></div>
                                        </div>
                                        <!--end::Symbol-->
                                        {{ $product->parent ? $product->parent->name : $product->name }}
                                        </td>
                                        <td class="text-center pt-7 align-middle">
                                            {{ $product->size ?  $product->size->size . '-'.$product->color->name : '-'}}
                                        </td>
                                        <td class="text-center pt-7 align-middle">{{ $product->pivot->quantity }}</td>
                                        <td class="text-center pt-7 align-middle">{{ number_format($product->pivot->price, 2) }} {{ t('SAR') }}</td>
                                        <td class="text-primary pr-0 pt-7 text-center align-middle">{{ number_format(($product->pivot->price * $product->pivot->quantity) ,2) }} {{ t('SAR') }}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice body-->
                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-muted text-uppercase">{{ t('Payment Method','site') }}</th>
                                        @if($item->payment_method == 'credit')
                                            <th class="font-weight-bold text-muted text-uppercase">{{ t('credit','site') }}</th>
                                      
                                        @endif
                                        <th class="font-weight-bold text-muted text-uppercase text-center">{{ t('Coupon','site') }}</th>
                                        <th class="font-weight-bold text-muted text-uppercase text-center">{{ t('Total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-weight-bolder">
                                        <td>{{ $item->payment_method == 'credit' ? 'الدفع اونلاين' : 'الدفع عند الاستلام' }}</td>
                                        @if($item->payment_method == 'credit')
                                            {{-- <td>{{ t($item->payment->status,'site') }}</td> --}}
                                            <td>{{ $item->payment ? t($item->payment->status,'site') : t('Payment Process Error','site') }}</td>
                                        @endif
                                        <td class="text-center">{{ $item->coupon_code ? $item->coupon_code . ' ( '. number_format($item->discount, 2) . t('SAR') . ' )' : '-' }}</td>
                                        <td class="text-primary font-size-h3 font-weight-boldest text-center">{{ number_format($item->total, 2) }} {{ t('SAR') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between">
                            {{-- <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Order Details</button> --}}
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">طباعة بيانات الطلب</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Layout-->
@endsection