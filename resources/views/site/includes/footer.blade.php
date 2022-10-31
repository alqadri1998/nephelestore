<?php 
$setting = \App\Setting::pluck('value','key')->toArray();
?>
<!--Footer -->
<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
               

                <div class="col-lg-4 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">{{ t('Pages interest', 'site') }}</h4>

                        <ul class="links">
                            <li><a href="{{ route('page','about-us') }}">{{ t('About Us','site') }}</a></li>
                            <li><a href="{{ route('shop') }}">{{ t('My Products','site') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ t('Contact Us','site') }}</a></li>
                            <li><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
                            <li><a target="_blank" href="{{ $settings['maroof_link']??'#' }}">{{t('Maroof','site') }}</a></li>
                            <li><a href="{{ route('page','policy') }}">{{ t('Privacy','site') }}</a></li>
                            <li><a href="{{ route('page','terms-and-conditions') }}">{{ t('Terms And Conditions','site') }}</a></li>
                            
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

               {{--  <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">{{ t('Pages','site') }}</h4>

                        <ul class="links">
                            <li> <a href="{{ route('contact') }}">{{ t('Contact Us','site') }}</a></li>
                            <li><a href="{{ route('page','about-us') }}">{{ t('About Us','site') }}</a></li>
                            <li><a href="{{ route('shop') }}">{{ t('Shop','site') }}</a></li>
                            
                            
                            <li><a href="{{ route('home') }}">{{ t('Home','site') }}</li>
                            
                        </ul>
                    </div>
                    
                </div> --}}
                <!-- End .col-lg-3 -->
                 <div class="col-lg-4 col-sm-6">
                    <div class="widget contact-us-widget">
                        <h4 class="widget-title">{{ t('Contact Us','site') }}</h4>
                        <ul class="contact-info">
                            <li>
                                <span><i class="fa fa-location-arrow"></i></span><span class="contact-info-label">{{ t('Address','site') }}:</span>{{ $setting['location']??'' }}
                            </li>
                            <li>
                                <span><i class="fa fa-mobile"></i></span> <span class="contact-info-label">{{ t('Phone','site') }}:</span><a href="tel:">{{ $setting['mobile']??'' }}</a>
                            </li>
                            <li>
                                <span><i class="fa fa-envelope"></i></span> <span class="contact-info-label">{{ t('Email','site') }}:</span> <a href="mailto:{{ $setting['email']??'' }}"> {{ $setting['email']??'' }} </a>
                            </li>
                            {{-- <li>
                                <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                            </li> --}}
                        </ul>
                        <div class="social-icons">
                            <a href="{{ $setting['facbook_link']??'#' }}" class="social-icon social-facebook icon-facebook" target="_blank" title="{{ t('Facebook','site') }}"></a>
                            <a href="{{ $setting['twitter_link']??'#' }}" class="social-icon social-twitter icon-twitter" target="_blank" title="{{ t('Twitter','site') }}"></a>
                            <a href="{{ $setting['instagram_link']??'#' }}" class="social-icon social-instagram icon-instagram" target="_blank" title="{{ t('Instagram','site') }}"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">{{ t('Subscribe newsletter','site') }}</h4>
                        <p>{{t('Get all the latest information on events, sales and offers. Sign up for newsletter:','site')}}
                        </p>
                        <form action="{{ route('subscription') }}" method="post" class="mb-0">
                            {{ csrf_field() }}
                            <input type="email" class="form-control m-b-3 custom-subscription" name="email" placeholder="{{ t('Email address','site') }}" required>

                            <input type="submit" class="btn btn-primary shadow-none subscribe-btn custom-subscription-btn" value="{{ t('Subscribe','site') }}">
                        </form>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">&copy; {{ $settings['site_name_ar']??'Nephele' }}. {{ date('Y') }}. {{ t('All Rights Reserved','site') }}</span>
                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons">
                        <span class="payment-icon verisign apple-pay-icon">
                            <i class="fab fa-cc-visa" style="font-size: 26px;margin-top: 7px;" aria-hidden="true"></i>

                        </span> 
                        <span class="payment-icon verisign apple-pay-icon">
                            <i class="fab fa-cc-mastercard" style="font-size: 26px;margin-top: 7px;" aria-hidden="true"></i>
                        </span> 

                         <span class="payment-icon verisign mada-icon" 
                        style="background-image:  url({{ url('/assets/site/images/payments/mada.jpg') }})"></span>
                        <span class="payment-icon verisign apple-pay-icon">
                            <i class="fab fa-apple-pay fa-lg" style="font-size: 26px;margin-top: 7px;" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="footer-right">
                   
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>
<!-- /Footer