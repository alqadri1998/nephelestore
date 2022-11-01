@extends('site.layouts.app')
@section('title')
| {{ t('Checkout' , 'site') }}
@endsection
@section('head')
    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.5.5/moyasar.css">

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.5.5/moyasar.js"></script>
    <style>
        .mysr-form, .mysr-form input{
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        #mysr-form-form-el#mysr-form-form-el#mysr-form-form-el.mysr-form-moyasarForm[payment-form=true] .mysr-form-ccInputGroup .mysr-form-ccIconsGroup{
            /* right: {{ app()->getLocale() == 'ar' ? 'unset' : '0' }} !important;
            left: {{ app()->getLocale() == 'ar' ? '0' : 'unset' }} !important; */
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="text-center">
        <h2 class="mt-4"> {{ t('Shopping Bag', 'site') }} </h2>
        <span class="text-dark" style="font-size: 14px">{{ t('Payment', 'site') }} {{ $order->total_item_count }}</span>
    </div>
    <hr>


    <div class="row">

        <div class="col-lg-7">

            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ t('Payment', 'site') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> {{ t('Payment', 'site') }} - Tamara  </a>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="booking-success.html">
                        <div class="payment-widget">
                            {{-- <h4 class="card-title">{{ t('Payment', 'site') }}</h4> --}}

                            <!-- Credit Card Payment -->
                            <div class="payment-list">
                                <div class="mysr-form"></div>
                            </div>
                            <!-- /Credit Card Payment -->

                            <!-- Submit Section -->
                        {{--  <div class="submit-section mt-4">
                                <button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
                            </div> --}}
                            <!-- /Submit Section -->

                        </div>
                    </form></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.
                    ..</div>

              </div>

        </div>
        <!-- End .col-lg-8 -->

        <div class="col-lg-5">
            <div class="order-summary">
                <h3>{{ t('Your Order','site') }}</h3>

                <table class="table table-mini-cart">
                    <thead>
                        <tr>
                            <th colspan="">{{ t('Products','site') }}</th>
                            {{-- <th>{{ t('Size/Color','site') }}</th> --}}
                            <th>{{ t('Quantity','site') }}</th>

                            <th>{{ t('Total','site') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $item)
                        <tr>
                            <td class="product-col">
                                <h3 class="product-title">
                                    {{ $item->parent ? $item->parent->name:$item->name }}
                                </h3>
                            </td>
                            {{-- <td> {{ $item->size ? $item->size->size .'-'.$item->color->name: '-' }}</td> --}}
                            <td> {{ $item->pivot->quantity }}</td>

                            <td class="price-col">
                                <span>{{ $item->pivot->price *$item->pivot->quantity }}{{ t('SAR','site') }}</span>
                            </td>
                        </tr>
                        @endforeach

                     {{--    <tr>
                            <td class="product-col">
                                <h3 class="product-title">
                                    Fashion Computer Bag ×
                                    <span class="product-qty">2</span>
                                </h3>
                            </td>

                            <td class="price-col">
                                <span>$418.00</span>
                            </td>
                        </tr> --}}
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <td>
                                <h4>{{ t('Subtotal','site') }}</h4>
                            </td>

                            <td class="price-col">
                                <span>{{ number_format($order->sub_total, 2) .' '.t('SAR','site')}}</span>
                            </td>

                        </tr>
                        @if($order->discount > 0)
                            <tr class="cart-subtotal">
                                <td><h4>{{ t('Discount','site') }}</h4></td>
                                <td class="price-col"> <span>{{ number_format($order->discount, 2) .' '.t('SAR','site')}}</span></td>
                            </tr class="cart-subtotal">

                        @endif
                        <tr>
                            <td><h4>{{ t('Shipping Price','site') }}</h4></td>
                            <td class="price-col"><span>{{ number_format($order->shipping_price ,2) .' '.t('SAR','site')}}</span></td>
                        </tr>
                         <tr>
                            <td><h4>{{ t('Vat','site') }}</h4></td>
                            <td class="price-col"><span>{{ number_format($order->vatAmount ,2) .' '.t('SAR','site')}}</span></td>
                        </tr>
                        <tr>
                                <td><h4>{{ t('Total including tax','site') }}</h4></td>
                                <td class="price-col"><span>{{ number_format($order->total,2) .' '.t('SAR','site')}}</span></td>
                            </tr>



                    </tfoot>
                </table>


            </div>
            <!-- End .cart-summary -->
        </div>
        <!-- End .col-lg-4 -->
    {{-- </div> --}}
    <!-- End .row -->
</div>


@endsection

@section('scripts')
    @section('scripts')
    <script>
        Moyasar.init({
            element: '.mysr-form',
            language: '{{ app()->getLocale() == 'ar' ? 'ar' : 'en'}}',
            amount: {{ ($order->total) * 100 }},
            currency: 'SAR',
            description: '{{ $order->order_id }}',
            publishable_api_key: 'pk_test_sHa4FhahXdASR6BLK7HSfumkcCvPKtzRMDBHSZ2f',
            callback_url: "{{ route('checkout.thankyou', $order->id) }}",
            methods: [
                'creditcard',
                 'applepay'
            ],
            apple_pay: {
                country: 'SA',
                label: 'Nephele Store',
                validate_merchant_url: 'https://api.moyasar.com/v1/applepay/initiate',
            }
        });

    </script>

@endsection
