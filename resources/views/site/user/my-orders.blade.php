@extends('site.layouts.app')
@section('title')
| {{ t('My Orders','site') }}
@endsection
@section('content')
<div class="page-header">
<div class="container d-flex flex-column align-items-center">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">{{ t('My Account','site') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ t('My Orders','site') }}
                </li>
            </ol>
        </div>
    </nav>

    <h1>{{ t('My Orders','site') }}</h1>
</div>
</div>


<div class="container account-container custom-account-container">
<div class="row">
    <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
        <h2 class="text-uppercase">{{ t('My Account','site') }}</h2>
        @include('site.user.includes.dashboard-menu')
    </div>
    <div class="col-lg-9 order-lg-last order-1 tab-content">
        <div class="tab-pane fade show active" id="order" role="tabpanel">
            <div class="order-content">
                <h3 class="account-sub-title d-none d-md-block"><i
                        class="sicon-social-dropbox align-middle mr-3"></i>{{ t('Orders', 'site') }}</h3>
               
                @if(count($orders) > 0)
            <div id="accordion">
              @foreach($orders as $index=>$order)
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#ord{{ str_replace('-', '', $order->order_id) }}" aria-expanded="true" aria-controls="ord{{ str_replace('-', '', $order->order_id) }}">
                        {{ t('Order Number','site') }}: {{ $order->order_id }}
                      </button>
                    </h5>
                  </div>{{--card-header--}}

                  <div id="ord{{ str_replace('-', '', $order->order_id) }}" class="collapse {{$index == 0 ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <h5 class="text-center">{{ t('Order Date','site') }} | {{ $order->created_at->format('d-m-Y H:i A') }}</h5>
                        <ul class="checkout-progress-bar">
                            <?php $statusArr = ['cancelled'];?>
                        @if( in_array($order->status, $statusArr))

                            <li class="{{ in_array($order->status, $statusArr) ? 'active' : '' }}">
                                <span>{{ t('Cancelled','site') }}</span>
                            </li>

                        @elseif($order->payment_method == 'credit' && $order->paid == 0)
                        <li class="active">
                                 <span><a href="{{ route('checkout.payment',$order->id) }}">{{ t('An error occurred in the payment process, you can try again from here','site') }}</a></span>
                            </li>
                        @else

                            <li class="{{ $order->status == 'pending' ||$order->status == 'paid' || $order->status == 'shipped' || $order->status == 'delivered' || $order->status == 'confirmed' ? 'active' : '' }}">
                                <span>{{ t('Pending','site') }}</span>
                            </li>
                            <li class="{{ $order->status == 'paid' || $order->status == 'shipped' || $order->status == 'delivered' || $order->status == 'confirmed' ? 'active' : '' }}">
                                <span>{{ t('Confirmed','site') }}</span>
                            </li>
                            <li class="{{ $order->status == 'shipped' || $order->status == 'delivered'  ? 'active' : '' }}">
                                <span>{{ t('Shipped','site') }}</span>
                            </li>
                          {{--   <li class="{{ $order->status == 'waiting_for_shipping'  ? 'active' : '' }}">
                                <span>{{ t('Waiting Shipped','site') }}</span>
                            </li> --}}
                            {{-- <li class="{{ $order->status == 'shipped' ? 'active' : '' }}">
                                <span>{{ t('Shipped','site') }}</span>
                            </li> --}}
                            <li class="{{ $order->status == 'delivered' ? 'active' : '' }}">
                                <span>{{ t('Delivered','site') }}</span>
                            </li>
                        @endif
                        </ul>{{--ul checkout-progress-bar--}}
                        <div class="order_products">
                            <div class="row">

                                <div class="col-12 col-md-12 col-xl-12">
                                        <table class="table table-hover" style="margin-bottom: 50px;">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ t('Prouduct','site')}}</th>
                                            <th scope="col">{{ t('Quantity','site') }}</th>
                                            <th scope="col">{{ t('Price','site') }}</th>
                                            <th scope="col">{{ t('Total','site') }}</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i = 1; ?>
                                          {{-- {{ dd($order->products->toArray()) }} --}}
                                          @foreach($order->products as $product)
                                            <tr>
                                              <th scope="row">{{ $i++ }}</th>
                                              <td>
                                              	{{ $product->parent ? $product->parent->name : $product->name }}
                                              </td>
                                              <td>{{ $product->pivot->quantity }}</td>
                                              
                                              <td>{{ $product->special_price ?$product->special_price:$product->price }}</td>
                                              <td>{{ $product->pivot->quantity * ($product->special_price ?$product->special_price:$product->price) }}</td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                </div>{{--end col 12--}}
                                
                                  <div class="col-12 col-md-12 col-xl-12">
                                      <div class="order_info">
                                          <div class="shippingto">
                                              <h4>{{ t('Shipping To','site') }} : <b>{{ $order->name }}</b></h4>
                                              
    <h4>{{ t('Address','site') }} : {{ $order->area  && $order->city ? $order->area->name .' '. $order->city->name .' '.$order->street_address: '-'}}<b></h4>
                                              <h4>{{ t('Mobile','site') }} : <b>{{ $order->mobile }}</b></h4>
                                          </div>
                                      </div>
                                  </div>
                                


                                <div class="col-12 col-md-12 col-xl-12">
                                        <div class="order_info">
                                            <div class="shippingto_method_totaly">
                                                <h4>{{ t('Payment Method','site') }} : <b> 
                                                {{ __('site.'.$order->payment_method) }} </b></h4>
                                                @if($order->discount > 0)
                                                <h4>{{ t('Discount', 'site') }} : <b> {{ number_format($order->discount,2) }} {{ t('SAR','site') }}</b></h4>
                                                @endif
                                                @if($order->shipping_price && $order->shipping_price > 0)
                                                <h4>{{ t('Shipping Price','site') }} : <b> {{ number_format($order->shipping_price, 2) }} {{ t('SAR','site') }}</b></h4>
                                                @endif
                                                <h4>{{ t('Total','site') }} : <b> {{ number_format($order->total,2) }} {{ t('SAR','site') }}</b></h4>
                                              
                                            </div>
                                           {{--  @if($order->status == 'pending' || $order->status == 'confirmed' || $order->status == 'waiting_for_shipping')
                                                <a href="{{ route('orders.change_status', ['order_id' => $order->id, 'status' => 'cancelled']) }}" style="text-decoration: none;" class="btn btn-danger btn-sm" onclick="return confirm(' متأكد انك تريد الغاء الطلب ؟')"
                                                    title="{{ __('site.order_status.order_cancell') }} ">
                                                    @lang('site.order_status.order_cancell')</a>
                                            @endif

                                            @if($order->status == 'completed')
                                            {{ route('orders.change_status', ['order_id' => $order->id, 'status' => 'refunded']) }}
                                                <a href="" style="text-decoration: none;" class="btn btn-danger btn-sm"
                                                    onclick="return confirm(' متأكد انك تريد ارجاع المنتج ؟')"
                                                    title="{{ __('site.order_status.order_refunded') }} ">
                                                    @lang('site.order_status.order_refunded')
                                                </a>
                                            @endif --}}
                                        </div>
                                    </div>{{--end col 12--}}


                        </div>
                    </div>{{--order_products--}}
                    </div>
                  </div>{{--card-body"--}}
                </div>{{--card--}}
                @endforeach
              </div>
              @else
              <h3>{{ t('No Orders Found','site') }}</h3>
              @endif
            </div>
        </div>
        <!-- End .tab-pane -->       
    </div><!-- End .tab-content -->
</div><!-- End .row -->
<div class="mb-5"></div><!-- margin -->
</div><!-- End .container -->

@endsection			