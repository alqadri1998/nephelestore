<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ url('/assets/admin/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ url('/assets/admin/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ url('/assets/admin/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ url('/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
{{-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script> --}}
<script src="{{ url('/assets/admin/plugins/custom/gmaps/gmaps.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ url('/assets/admin/js/pages/widgets.js') }}"></script>

{{-- datepicker --}}
<script src="{{ url('/assets/admin/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
{{-- wizard --}}
<script src="{{ url('/assets/admin/js/pages/custom/wizard/wizard-1.js') }}"></script>

{{-- Select 2 --}}
<script src="{{ url('/assets/admin/js/pages/crud/forms/widgets/select2.js') }}"></script>

{{-- bootstrap-touchspin --}}
<script src="{{ url('/assets/admin/js/pages/crud/forms/widgets/bootstrap-touchspin.js') }}"></script>

{{-- File Upload --}}
<script src="{{ url('/assets/admin/js/pages/crud/file-upload/image-input.js') }}"></script>
{{-- Print This  --}}
<script src="{{ url('/assets/admin/js/printThis.js') }}"></script>

<script src="{{ url('/js/commander.js') }}"></script>
{{-- cutom js --}}
<script src="{{ url('/assets/admin/js/custom.js') }}"></script>

@stack('scripts')

        
@include('admin.includes.flash_messages')
<script>
	$(document).ready(function(){
		$('.btnDestroy').click(function(e){
			e.preventDefault();
			if(confirm(t('Are you sure to delete ?'))){
				this.form.submit();
			}
		});
		$('.btn-delete').click(function(e) {
		    e.preventDefault();
		    var _this = $(this);
			Swal.fire({
				text: "{{ t('Are you sure to delete ?') }}",
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "{{t('Yes')}}",
				cancelButtonText: "{{t('No')}}",
				customClass: {
					confirmButton: "btn font-weight-bold btn-primary",
					cancelButton: "btn font-weight-bold btn-default"
				}
			}).then(function (result) {
		        console.log(result);
		        if(result.value){
		            console.log(_this);
		    		_this.parents('form').submit();
		        }
			});
		});
		$('#discount_percent').keyup(function(e){
			if($(this).val().trim() != ''){
				$('#discount_price').attr('disabled', true);
				if($('#priceInput').val().trim() != ''){
					var price = $('#priceInput').val().trim();
					var percent = $(this).val().trim();
					$('#discount_price').val(price - parseInt(percent * price / 100));
				}
			}else{
				$('#discount_price').removeAttr('disabled');
				$('#discount_price').val('');
			}
		});
		$('#discount_price').keyup(function(e){
			if($(this).val().trim() != ''){
				$('#discount_percent').attr('disabled', true);
				var price = $('#priceInput').val().trim();
				var amount = $(this).val().trim();
				$('#discount_percent').val(100 - parseInt(amount / price * 100));
			}else{
				$('#discount_percent').removeAttr('disabled');
				$('#discount_percent').val('');
			}
		});
	});

</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-container').css('display', 'block');
                $('#img-container').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#img-input").change(function() {
        readURL(this);
    });
</script>

@yield('scripts')