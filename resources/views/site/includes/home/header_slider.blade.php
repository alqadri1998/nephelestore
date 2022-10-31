{{-- slide-animate --}}
<div class="header-slider-custom owl-carousel owl-theme show-nav-hover nav-big">
    @if(count($homeSlider) > 0)
    @foreach($homeSlider as $slide)
    <div class="home-slide home-slide1 banner d-flex align-items-center item">
        <a href="{{ $slide->url ?url($slide->url) : '#' }}" style="display: block !important;width: 100% !important;">
        <img class="slide-bg img-fluid" 
        src="{{ url($slide->path) }}"
            style="background-color: #ecc;" alt="home banner">
        </a>
    </div>
    @endforeach
    @endif

 {{--    <div class="home-slide home-slide2 banner d-flex align-items-center item">
        <img class="slide-bg" 
        src="{{ url('assets/site/images/photos/01.jpeg') }}"
            style="background-color: #bfcec9;" alt="home banner">
      
    </div> --}}
</div>