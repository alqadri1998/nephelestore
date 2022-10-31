<?php
$setting = \App\Setting::pluck('value', 'key')->toArray();
$categories = \App\Category::where('active', true)->whereNull('parent_id')->get();
$wishList = Auth::check() ? Auth::user()->wishlist()->where('products.active', 1)->pluck('products.id')->toArray() : [];
?>
<header class="header {{ Route::currentRouteName() == 'home'? 'pages' : 'pages' }}">
    <div class="header-middle sticky-header" style="background: #212338 !important;">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler" type="button">
                    <i class="fas fa-bars"></i>
                </button>

                <a href="{{ route('home') }}" class="Nephele">
                    <img src="{{ url('assets/site/images/logo.png') }}" alt="Nephele" width="90">
                    <!-- <img src="assets/images/logo-black.png" alt="Porto Logo"> -->
                </a>

             <nav class="main-nav font2">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{ route('home') }}">{{ t('Home','site') }}</a>
                        </li>
                         <li>
                            <a href="{{ route('page','about-us') }}">{{ t('About Us','site') }}</a>
                        </li>
                        <li>
                            {{-- {{ route('shop') }} --}}
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
                                       {{--  <li><a href="#">Shopping Cart</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Dashboard</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Blog Post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">Forgot Password</a></li> --}}
                            </ul>


                        </li>
                        <li>
                            <a href="{{ route('contact') }}">{{ t('Contact Us','site') }}</a>
                        </li>

                    </ul>
                </nav>
            </div><!-- End .header-left -->

            <div class="header-right">

                @if(app()->getLocale() == 'en')
                    <a class="header-icon" title="العربية" href="{{ route('changeLang', 'ar') }}">
                    {{-- Ar --}}
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    </a>
                @else
                    <a class="header-icon" title="English" href="{{ route('changeLang', 'en') }}">
                    {{-- Eng --}}
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    </a>
                @endif

                <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                    <form action="{{ url('/shop/products') }}" method="get">
                        <div class="header-search-wrapper">
                            @if(app()->getLocale() == 'ar')
                                <button class="btn text-dark icon-magnifier" type="submit"></button>

                                <div class="select-custom">
                                    <select id="cat" name="category">
                                        <option value="">{{ t('All Categories','site') }}</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <input type="search" class="form-control" name="keyword" id="q"
                                    placeholder="{{ t('Search', 'site') }}..." required="">
                            @else
                            <input type="search" class="form-control" name="keyword" id="q"
                                placeholder="{{ t('Search', 'site') }}..." required="">
                            <div class="select-custom">
                                <select id="cat" name="category">
                                    <option value="">{{ t('All Categories','site') }}</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn text-dark icon-magnifier" type="submit"></button>
                            @endif
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div>
                @if(!Auth::check())
                    <a href="{{ url('/login') }}" class="header-icon header-icon-user login-user-icon" title="Login">
                        <i class="icon-user-2"></i>
                        {{-- {{ t('Login','site') }} --}}
                    </a>
                @else
                 <div class="dropdown account-dropdown">
                    <a href="#" class="dropdown-toggle dropdown-arrow" role="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-user-2"></i>
                        {{-- {{ Auth::user()->name }} --}}

                    </a>


                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ t('My Account','site') }}</a>
                            <a class="dropdown-item" href="{{ route('user.myOrders') }}">{{ t('My Orders','site') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">{{ t('Logout','site') }}</a>
                          </div><!-- End .dropdown-menu -->
                    </div><!--dropdown-->
                @endif

                <a href="{{ Auth::check() ? route('wishlist'): route('login') }}" class="header-icon header-icon-wishlist" style="position: relative;" title="{{ t('Wishlist','site') }}"><i
                        class="icon-wishlist-2"></i>
                        @if(Auth::check() && count($wishList) > 0)
                        {{-- <span class="cart-count badge-circle" id="wishlistCount"></span> --}}
                        @endif
                </a>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-cart-thick"></i>
                        <span class="cart-count badge-circle">0</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">{{ t('Shopping Cart', 'site') }}</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">

                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>{{ t('SUBTOTAL','site') }}:</span>

                                <span class="cart-total-price float-right"></span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{ route('myCart') }}" class="btn btn-gray btn-block view-cart">
                                    {{ t('View Cart','site') }}
                                </a>
                                <a href="{{ route('checkout') }}" class="btn btn-dark btn-block">{{ t('Checkout','site') }}</a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdownmenu-wrapper -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->