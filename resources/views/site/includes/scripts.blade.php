<!-- Plugins JS File -->
<script src="{{ url('/assets/site/js/jquery.min.js')}}"></script>
<script src="{{ url('/assets/site/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('/assets/site/js/plugins.min.js')}}"></script>
<script src="{{ url('/assets/site/js/jquery.appear.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{url('assets/site/plugins/select2/js/select2.min.js')}}"></script>




<!-- Main JS File -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60281eec78fc4134"></script> --}}
{{-- Custom Ajax Calls --}}
{{-- owl cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('assets/site/js/main.js') }}"></script>
<script src="{{ url('/js/commander.js') }}"></script>
<script src="{{ url('/js/wishlist-scripts.js') }}"></script>
<script src="{{ url('/js/cart-scripts.js') }}"></script>
<script src="{{ url('assets/site/toastr/toastr.min.js') }}"></script>
@include('site.includes.flash_messages')
@yield('scripts')

