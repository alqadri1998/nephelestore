<?php
$setting = \App\Setting::pluck('value', 'key')->toArray();
?>
@extends('site.layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12">

            <div class="payment-widget text-center">
                <h4 class="card-title mt-4">{{ t('Thank You', 'site') }}</h4>
                @if(isset($paymentStatus) && $paymentStatus == false)
                <div class="error"
                        style="width: 50%;margin: 50px auto;overflow:hidden">
                    <div>
                        <img
                            src="{{ $setting['logo'] ? url($setting['logo']): url('assets/site/images/logo.png') }}"
                            class="img-responsive center-block" style="max-width: 400px;margin: auto;" alt="{{ $settings['site_name_ar'] ?? 'Nephele' }}">
                    </div>

                    <h2>{{ t('Thanks','site') }} {{ Auth::check() ?  Auth::user()->name : ' ' }} </h2>
                    <p class="text-danger">{{ t('An error occurred during the payment process, please try to pay again','site') }}</p>
                    <br>
                    <a href="{{ route('checkout.payment',$createdOrder->id) }}">{{ t('You can try again here','site') }}</a>
                    <br>


                </div>
                @else
                <div class="succ"
                        style="width: 50%;margin: 50px auto;overflow:hidden">
                    <div>
                        <img
                            src="{{ $setting['logo'] ? url($setting['logo']): url('assets/site/images/logo.png') }}"
                            class="img-responsive center-block" style="max-width: 400px;margin: auto;" alt="{{ $settings['site_name_ar'] ?? 'Nephele' }}">
                    </div>

                    <h2>{{ t('Thanks','site') }} {{ Auth::check() ?  Auth::user()->name : ' ' }} </h2>
                    <p>{{ t('Your request has been successfully registered','site') }}</p>
                    <br>
                    <a href="{{ route('user.myOrders') }}">{{ t('You can track the order here','site') }}</a>
                    <br>
                    <a href="{{ route('home') }}">{{ t('You can continue shopping here','site') }}</a>

                </div>
                @endif


            </div>

        </div>
        <!-- End .col-lg-8 -->


        <!-- End .col-lg-4 -->
    {{-- </div> --}}
    <!-- End .row -->
</div>


@endsection

@section('scripts')


@endsection