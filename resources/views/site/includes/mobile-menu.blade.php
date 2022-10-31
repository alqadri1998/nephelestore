<?php 
 $categories = \App\Category::where('active',true)->whereNull('parent_id')->get();
?>
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
                    <li>
                        <a href="{{ route('page','about-us') }}">{{ t('About Us','site') }}</a>
                        
                    </li>
                    {{-- <li>
                        <a href="{{ route('shop') }}">{{ t('Shop','site') }}</a>
                        
                    </li> --}}
                    <li>
                            <a href="#">{{ t('My Products','site') }}</a>
                            <ul >
                                @foreach($categories as $category)
                                @if($category->children->count() > 0)
                                <li><a href="#">{{ $category->name }}</a>
                                    <ul>
                                        @foreach($category->children as $child)
                                        <li><a href="{{ url('/shop/products?category='.$child->slug) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                        {{-- <li><a href="#">Blog Post</a></li> --}}
                                    </ul>
                                </li>
                                @else
                                <li>
                                <a href="{{ url('/shop/products?category='.$category->slug) }}">
                                        {{ $category->name }}</a></li>
                                @endif
                                @endforeach        
                                      
                            </ul>
                           
                           
                        </li>
                    <li>
                        <a href="{{ route('contact') }}">{{ t('Contact Us','site') }}</a>
                        
                    </li>                 
                    
                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    <li class="border-0">
                       @if(app()->getLocale() == 'en')
                        <a href="{{ route('changeLang', 'ar') }}" title="العربية" ><i class="fa fa-globe" aria-hidden="true"></i> العربية</a>
                    @else
                        <a  href="{{ route('changeLang', 'en') }}" title="English"> <i class="fa fa-globe" aria-hidden="true"></i> English</a>
                    @endif
                    </li>
                    
                </ul>

                <ul class="mobile-menu">
                     @if(!Auth::check())
                     <li><a href="{{ route('login') }}" class="login-link">{{t ('Login','site') }}</a></li>
                     @else
                    <li><a href="{{ route('user.dashboard') }}">{{ t('My Account','site') }}</a></li>
                    <li><a href="{{ route('user.myOrders') }}">{{ t('My Orders','site') }}</a></li>
                    <!-- <li><a href="blog.html">Blog</a></li> -->
                    <li><a href="{{ route('wishlist') }}">{{ t('Wishlist','site') }}</a></li>
                    <li><a href="{{ route('myCart') }}">{{ t('Cart','site') }}</a></li>
                    <li><a href="{{ route('logout') }}" class="login-link">{{ t('Logout','site') }}</a></li>
                    @endif
                </ul>
            </nav><!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="{{ url('/shop/products') }}" method="get">
                <input type="text" class="form-control mb-0" name="keyword" id="q"
                                    placeholder="{{ t('Search', 'site') }}..."required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="{{ $setting['facbook_link']??'#' }}" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="{{ $setting['twitter_link']??'#' }}" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="{{ $setting['instagram_link']??'#' }}" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    {{-- <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo4.html">
                <i class="icon-home"></i>ahmed
            </a>
        </div>
        <div class="sticky-info">
            <a href="category.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="#" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div> --}}