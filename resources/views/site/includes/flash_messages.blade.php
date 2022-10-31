<script>
	$(document).ready(function(){
		toastr.options = {
			"rtl": false,
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-left",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "50000",
			"extendedTimeOut": "10000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "slideDown",
			"hideMethod": "fadeOut"
		}
		@if ($errors->any())
    		@foreach ($errors->all() as $error)
        		toastr.error('{{ $error }}')
    		@endforeach
		@endif
		@if(Session::has('message-success'))
		toastr.success('{{ Session::get('message-success') }}')
		@endif
		@if(Session::has('message-info'))
		toastr.info('{{ Session::get('message-info') }}')
		@endif
		@if(Session::has('message-danger'))
		toastr.warning('{{ Session::get('message-danger') }}')
		@endif    
		@if(Session::has('message-error'))
		toastr.error('{{ Session::get('message-error') }}')
		@endif
	});
</script>