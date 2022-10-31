@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.create'),
	'menu'      => [
		__('admin.product_sizes.index') => route('admin.product_sizes.index'),
		__('admin.create') => route('admin.product_sizes.create'),
	],
	])
	@endsection

	@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<h3 class="card-title">{{ __('admin.create') }}</h3>
				</div>
				@include('admin.pages.product_sizes.form')
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah').css('display', 'block');
					$('#blah').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#imgInp").change(function() {
			readURL(this);
		});
	</script>
	@endsection