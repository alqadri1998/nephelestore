<?php
$locale = Session::has('locale') ? Session::get('locale') : config('app.locale');
?>
<!DOCTYPE html>
<html lang="{{ $locale }}">

    @include('site.includes.header')
    <style>
.whats-app {

    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 54px;
    right: 6px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
    margin-top: 16px;

}


    </style>

    <body class="{{ Route::currentRouteName() == 'home'? 'full-screen-slider home' : 'all-pages' }}">

        <a  class="whats-app" href="https://wa.me/966502391994" target="_blank">
            <i class="fab fa-whatsapp" style="color: white"></i>
        </a>
        <!-- page-wrapper -->
        <div class="page-wrapper">

            @include('site.includes.menu')
            <main class="main">
                @yield('content')
            </main>
            @include('site.includes.footer')

       </div>
       <!-- /Main Wrapper -->
       @include('site.includes.addToCartModal')
        @include('site.includes.mobile-menu')
        {{-- @include('site.includes.loading') --}}
        @include('site.includes.scroll-top')
        @include('site.includes.scripts')


    </body>
</html>
