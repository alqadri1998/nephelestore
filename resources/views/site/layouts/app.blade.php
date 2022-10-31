<?php
$locale = Session::has('locale') ? Session::get('locale') : config('app.locale');
?>
<!DOCTYPE html> 
<html lang="{{ $locale }}">
    
    @include('site.includes.header')
    
    <body class="{{ Route::currentRouteName() == 'home'? 'full-screen-slider home' : 'all-pages' }}">


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