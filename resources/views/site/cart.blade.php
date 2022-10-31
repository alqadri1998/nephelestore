@extends('site.layouts.app')
@section('title')
| {{ t('Cart' , 'site') }}
@endsection
@section('content')
<div class="container">
   {{--  <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap checkout-breadcrumbs">
        <li class="active">
            <a href="#">{{ t('Shopping Cart','site') }}</a>
        </li>
        <li>
            <a href="#">{{ t('Checkout','site') }}</a>
        </li>
        <li class="disabled">
            <a href="#">{{ t('Order Complete','site') }}</a>
        </li>
    </ul> --}}
    <div class="text-center">
        <h2 class="mt-4"> {{ t('Shopping Bag', 'site') }} </h2>
        <span class="text-dark" style="font-size: 14px">{{ t('Purchases','site') }} {{ $totalQuantity }}</span>
    </div>
    
<hr>
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-table-container">
                <form action="{{ route('cart.update') }}" method="post">
                    {{ csrf_field() }}
                <table class="table table-cart">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">{{ t('Product','site') }}</th>
                            {{-- <th class="product-col">{{ t('Size','site') }}</th> --}}
                            {{-- <th class="product-col">{{ t('Color','site') }}</th> --}}
                            <th class="price-col">{{ t('Price','site') }}</th>
                            <th class="qty-col">{{ t('Quantity','site') }}</th>
                            <th class="text-right">{{ t('Subtotal','site') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if(count($items) > 0)
                            <input type="hidden" name="cartID" value="{{$cartID}}">
                                @foreach($items as $item)
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{ route('product.show', $item['slug']) }}" class="product-image">
                                        <img src="{{ $item['thumb'] }}" alt="{{ $item['name'] }}" width="100">
                                    </a>

                                    <a href="{{ route('removeFromCart', $item['id']) }}" class="btn-remove icon-cancel" title="{{ t('Remove Product','site') }}"></a>
                                </figure>
                            </td>
                            <td class="product-col">
                                <h5 class="product-title">
                                    <a href="#">{{ $item['name'] }}</a>
                                </h5>
                            </td>
                            {{-- <td class="text-right">
                            {{ $item['attributes'] ? $item['attributes']['size'] : ' - ' }}
                            </td>
                            <td class="text-right">
                            {{ $item['attributes'] ? $item['attributes']['color'] : ' - ' }}
                            </td> --}}
                           
                            <td class="text-right">{{ $item['price'] }}</td>
                            <td>
                                <div class="text-right product-title">
                                    {{-- {{ $item['quantity'] }} --}}
                                    <input class="form-control" name="cartItems[{{$item['id']}}]" type="number" value="{{ $item['quantity'] }}">
                                </div><!-- End .product-single-qty -->
                            </td>
                            <td class="text-right"><span class="subtotal-price product-title">
                                {{ $item['price'] * $item['quantity'] .' ' . t('SAR', 'site')}} 
                            </span></td>
                        </tr>
                        @endforeach
                            @endif

                        
                    </tbody>


                    <tfoot>
                        <tr>
                            <td colspan="7" class="clearfix">
                                <div class="float-left">
                                    <div class="cart-discount">
                                  {{--       <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="{{ t('Coupon Code','site') }}" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm" type="submit">{{ t('Apply Coupon','site') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form> --}}
                                        
                                    </div>
                                </div><!-- End .float-left -->

                                <div class="float-right">
                                    <button type="submit" class="btn btn-shop btn-update-cart">
                                        {{ t('Update Cart','site') }}
                                    </button>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            </div><!-- End .cart-table-container -->
        </div>

        <div class="col-lg-4">
            <div class="cart-summary">
                <h3 class="text-left">{{ t('Summary','site') }}</h3>
                <form action="{{ route('myCart') }}">                                               
                <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="coupon_code" 
                    placeholder="{{ t('Coupon Code','site') }}" required value="{{ isset($_GET['coupon_code']) ? $_GET['coupon_code'] : "" }}">
                <div class="input-group-append">
                    <button class="btn btn-sm" type="submit">{{ t('Apply Coupon','site') }}
                    </button>
                </div>
            </div><!-- End .input-group -->
            </form>
                <table class="table table-totals text-left">
                    <tbody>
                        <tr>
                            <td>{{ t('Subtotal','site') }}</td>

                            <td>{{ number_format($subTotal, 2) .' '.t('SAR','site')}}</td>
                        </tr>
                        @if($discount > 0)
                        <tr>
                            <td>{{ t('Discount','site') }}</td>
                            <td>{{ number_format($discount, 2) .' '.t('SAR','site')}}</td>
                        </tr>
                        <tr>
                            <td>{{ t('Total After Discount','site') }}</td>
                            <td>{{ number_format($subTotal - $discount,2) .' '.t('SAR','site')}}</td>
                        </tr>
                        @endif

                       
                    </tbody>

                    <tfoot>
                     {{--    <tr>
                            <td>{{ t('Shipping','site') }}</td>
                            <td>{{ $setings['shipping'] ? intival($setings['shipping']).' '.t('SAR','site'): 0 }}</td>
                        </tr> --}}
                        {{-- <tr>
                            
                            <td>{{ t('Total','site') }}</td>
                            <td>{{ $subTotal .' '.t('SAR','site')}}</td>
                        </tr> --}}
                    </tfoot>
                </table>

                <div class="checkout-methods">
                    {{-- isset($_GET['coupon_code']) ? $_GET['coupon_code'] : "" }} --}}
                    <?php 
                    $url = '';
                    if(isset($_GET['coupon_code']) && !empty($_GET['coupon_code'])){
                        $url = url('/to/checkout?coupon_code='.$_GET['coupon_code']);
                    }else{
                        $url = url('/to/checkout');
                    }
                    ?>
                    <a href="{{ $url }}" class="btn btn-block btn-dark">
                        @if(app()->getLocale() == 'ar')
                        <i class="fa fa-arrow-right"></i>
                        {{ t('Proceed to Checkout', 'site') }}
                        @else
                        {{ t('Proceed to Checkout', 'site') }}
                        <i class="fa fa-arrow-right"></i>
                        @endif
                    </a>
                </div>
            </div><!-- End .cart-summary -->
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // $('#city').select2({
            //     dir: "{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}",
            //     placeholder:"{{t('Select City', 'site')}}"
            // });
           
        })
    </script>
@endsection