@extends('site.layouts.app')
@section('title')
| {{ t('Home','site') }}
@endsection
@section('content')
{{-- Slider --}}
@include('site.includes.home.header_slider')
{{-- End .home-slider --}}
{{-- Shop By Category --}}
@include('site.includes.home.shop_byCategory',['categories'=>$categories])
{{-- End Shop By Category --}}
{{-- New sales --}}
@include('site.includes.home.sales')
{{-- New sales --}}
{{-- New Products --}}
@include('site.includes.home.new_products')
{{-- New Products --}}
@endsection

@section('scripts')
    <script>
        // $(document).ready(function () {
        $(document).ready(function(){
          $(".owl-carousel.header-slider-custom").owlCarousel({
                //lazyLoad: false,
                loop:true,
                dots: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 500,
                autoplayHoverPause:false,
                animateOut: 'fadeOut',
                navText: [ '<i class="icon-left-open-big">', '<i class="icon-right-open-big">' ],
                loop: true
              });
        });

           // $('.header-slider-custom .play').on('click',function(){
           //      owl.trigger('play.owl.autoplay',[1000])
           //  })
           //  $('.header-slider-custom .stop').on('click',function(){
           //      owl.trigger('stop.owl.autoplay')
           //  })
        // })
    {{-- </script> --}}

@endsection
