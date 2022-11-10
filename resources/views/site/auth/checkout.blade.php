@extends('site.layouts.app')
@section('title')
| {{ t('Cart' , 'site') }}
@endsection
@section('content')
<div class="container">
    {{-- <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap checkout-breadcrumbs">
        <li class="">
            <a href="{{ route('myCart') }}">{{ t('Shopping Cart','site') }}</a>
        </li>
        <li class="active">
            <a href="#">{{ t('Billing details','site') }}</a>
        </li>
        <li class="disabled">
            <a href="#">{{ t('Checkout','site') }}</a>
        </li>
    </ul> --}}
     <div class="text-center">
        <h2 class="mt-4"> {{ t('Shopping Bag', 'site') }} </h2>
        <span class="text-dark" style="font-size: 14px">{{ t('Purchases','site') }} {{ $totalQuantity }}</span>
    </div>
    <hr>
    @if(!Auth::check())
     <div class="login-form-container">
        <h2>{{ t('If you have an account, you can log in from here','site') }}</h2>

            <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">{{ t('Login','site') }}</button>
            {{-- <button data-toggle="collapse" data-target="#collapseTow" aria-expanded="true" aria-controls="collapseTow" class="btn btn-link btn-toggle">{{ t('Register','site') }}</button> --}}


        <div id="collapseOne" class="collapse">
            <div class="login-section feature-box">
                <div class="feature-box-content">
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        {{ csrf_field() }}
                        <p>
                           {{ t('Login','site') }}
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{  t('email address or mobile', 'site')}}<span
                                            class="required">*</span></label>
                                    <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="email" name="email" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{ t('Password', 'site') }} <span
                                            class="required">*</span></label>
                                    <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="password" name="password" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn">{{ t('Login','site') }}</button>

                        <div class="form-footer mb-1">
                            <div class="custom-control custom-checkbox mb-0 mt-0">
                                <input type="checkbox" class="custom-control-input" id="lost-password" name="remember" />
                                <label class="custom-control-label mb-0" for="lost-password">{{ t('Remember me','site') }}</label>
                            </div>

                            <a href="{{ route('forgotPassword')}}" class="forget-password">{{ t('Forgot Password?','site') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <div id="collapseTow" class="collapse">
            <div class="login-section feature-box">
                <div class="feature-box-content">
                    <form method="POST" action="{{ route('register') }}" id="login-form">
                        {{ csrf_field() }}
                        <p>
                            {{ t('Register','site') }}
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{ t('Name','site') }}<span
                                            class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{ t('Mobile','site') }} <span
                                            class="required">*</span></label>
                                    <input type="text" name="mobile" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{ t('Email address','site') }} <span
                                            class="required">*</span></label>
                                    <input type="text" name="email" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-0 pb-1">{{ t('Password','site') }} <span
                                            class="required">*</span></label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn">{{ t('Register','site') }}</button>

                        <div class="form-footer mb-1">

                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
    <hr>
    @endif
    <div class="row ">
        <div class="col-md-4">
            <div class="cart-table-container">
                <form action="{{ route('checkout') }}" method="GET">

                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="coupon_code"
                    placeholder="{{ t('Coupon Code','site') }}" required value="{{ isset($_GET['coupon_code']) ? $_GET['coupon_code'] : "" }}">
                    <div class="input-group-append">
                    <button class="btn btn-sm" type="submit">{{ t('Apply Coupon','site') }}
                    </button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


    <form action="{{ route('completeOrder') }}" method="post" id="checkout-form">
        {{ csrf_field() }}
        <input type="hidden" name="coupon" value="{{ isset($_GET['coupon_code']) && !empty($_GET['coupon_code']) ? $_GET['coupon_code'] :'' }}">
    <div class="row">
        <div class="col-lg-7">
            <ul class="checkout-steps">
                <li>
                    <h2 class="step-title">{{ t('Shipping details','site') }}</h2>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ t('Name', 'site') }}
                                        <abbr class="required" title="required">*</abbr>

                                    </label>
                                    <input type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" class="form-control" {{ !Auth::check() ? 'disable' : '' }} required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ t('Mobile','site') }}
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="mobile" value="{{ Auth::check() ? Auth::user()->mobile : '' }}" class="form-control" required {{ !Auth::check() ? 'disable' : '' }} />
                                </div>
                            </div>
                        </div>



                        <div class="select-custom">
                            <label>{{ t('Area', 'site')}}
                                <abbr class="required" title="required">*</abbr></label>

                            <select name="area" class="form-control" id="areas">
                                <option value=""></option>
                                @foreach($areas as $area)
                                <option value="{{ $area->id }}"
                                    {{ Auth::check() && Auth::user()->area_id ? (Auth::user()->area_id == $area->id ? 'selected' : '') : '' }}>{{ $area->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="select-custom">
                            <label>{{ t('City', 'site')}}
                                <abbr class="required" title="required">*</abbr></label>

                            <select name="city" class="form-control" id="city">
                                <option value=""></option>


                            </select>
                        </div>

                        <div class="form-group mb-1 pb-2">
                            <label>{{ t('Street address','site') }}
                                <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="street_address" class="form-control" placeholder="{{ t('House number and street name','site') }}" required value="{{ Auth::check() ? Auth::user()->street_address : '' }}" />
                        </div>



                        <div class="form-group">
                            <label class="order-comments">{{ t('Order notes (optional)','site') }}</label>
                            <textarea name="notes" class="form-control" placeholder="{{t('Notes about your order, e.g. special notes for delivery.','site')}}"></textarea>
                        </div>

                </li>
            </ul>
        </div>
        <!-- End .col-lg-8 -->

        <div class="col-lg-5">
            <div class="order-summary">
                <h3>{{ t('Your Order','site') }}</h3>

                <table class="table table-mini-cart">
                    <thead>
                        <tr>
                            <th>{{ t('Product','site') }}</th>
                            {{-- <th>{{ t('Size/Color','site') }}</th> --}}
                            <th>{{ t('Quantity','site') }}</th>
                            <th>{{ t('Total','site') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td class="product-col">
                                <h3 class="product-title">{{ $item['name'] }}</h3>
                            </td>
                            {{-- <td>{{ $item['attributes'] ? $item['attributes']['size'] .'-'.$item['attributes']['color'] : ' - ' }}</td> --}}

                            <td>{{ $item['quantity'] }}</td>

                            <td class="price-col">
                                <span>{{ $item['price'] * $item['quantity'] }}{{ t('SAR','site') }}</span>
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
                                <span>{{ number_format($subTotal, 2) .' '.t('SAR','site')}}</span>
                            </td>

                        </tr>
                        <?php $vatAmount = ($subTotal * $vat / 100);?>
                        @if($vat > 0)
                            <tr class="cart-subtotal">
                            <td>
                                <h4>{{ t('Vat','site') }}</h4>
                            </td>

                            <td class="price-col">

                                <span>{{ number_format($vatAmount,2) .' '.t('SAR','site')}}</span>
                            </td>

                        </tr>
                        @endif

                        @if($discount > 0)
                            <tr class="cart-subtotal">
                                <td><h4>{{ t('Discount','site') }}</h4></td>
                                <td class="price-col"> <span>{{ number_format($discount, 2) .' '.t('SAR','site')}}</span></td>
                            </tr class="cart-subtotal">

                        @endif
                        {{-- <tr>
                            <td><h4>{{ t('Shipping Price','site') }}</h4></td>
                            <td class="price-col"><span>{{ number_format($shipping ,2) .' '.t('SAR','site')}}</span></td>
                        </tr> --}}
                        <tr>
                                <td><h4>{{ t('Total including tax','site') }}</h4></td>
                                <td class="price-col"><span>{{ number_format(($subTotal + $shipping +$vatAmount) - ($discount),2) .' '.t('SAR','site')}}</span></td>
                            </tr>
                        <tr class="order-shipping">
                            <td class="text-left" colspan="2">
                                <h4 class="m-b-sm">{{ t('Payment Method','site') }}</h4>

                                <div class="form-group form-group-custom-control">
                                    <div class="custom-control custom-radio d-flex">
                                        <input type="radio" class="custom-control-input" name="payment_method" checked  value="pay_on_delivery" />
                                        <label class="custom-control-label">
                                        {{ t('Pay On Deliverd', 'site') }}
                                        </label>
                                    </div>

                                </div>


                                <div class="form-group form-group-custom-control mb-0">
                                    <div class="custom-control custom-radio d-flex mb-0">
                                        <input type="radio" name="payment_method" class="custom-control-input" value="credit">
                                        <label class="custom-control-label">
                                            {{ t('Payment through payment gateways', 'site') }}
                                        </label>
                                    </div>
                                    <!-- End .custom-checkbox -->
                                </div>
                                <!-- End .form-group -->
                            </td>

                        </tr>


                    </tfoot>
                </table>



                <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                    {{ t('Complete order','site') }}
                </button>
            </div>
            <!-- End .cart-summary -->
        </div>
        <!-- End .col-lg-4 -->
    {{-- </div> --}}
    <!-- End .row -->
</div>
    </form>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#areas').change(function(){
                    var val = $('#areas').val();
                    if(val != ""){
                        let url = window.location.origin;
                        let ajaxCall = Commander.ajax(url + '/getLocations/'+val, 'GET');
                        // console.log(ajaxCall.response.data);
                        if(ajaxCall.response.status.code == 200){
                            if(ajaxCall.response.status.error)
                                toastr.error(ajaxCall.response.status.message);
                            else{
                                $('#city').html('');

                                ajaxCall.response.data.forEach(function(item) {

                                var row = '<option value="'+item.id+'">'+item.name+'</option>';
                                    $('#city').append(row);
                                });

                            }

                        }

                    }
            });

        });
        $(document).ready(function () {
           $('body').each(function () {
            if($('#areas').val != ''){
                // $('#areas').change(function(){
                    var val = $('#areas').val();
                    if(val != ""){
                        let url = window.location.origin;
                        let ajaxCall = Commander.ajax(url + '/getLocations/'+val, 'GET');
                        // console.log(ajaxCall.response.data);
                        if(ajaxCall.response.status.code == 200){
                            if(ajaxCall.response.status.error)
                                toastr.error(ajaxCall.response.status.message);
                            else{
                                $('#city').html('');

                                ajaxCall.response.data.forEach(function(item) {
                                var row = '<option value="'+item.id+'">'+item.name+'</option>';
                                    $('#city').append(row);
                                });

                            }

                        }

                    }
            // });
            }
           })

        })
    </script>
@endsection