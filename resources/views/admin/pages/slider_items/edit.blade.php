@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.edit'),
	'menu'      => [
		__('admin.sliders.index') => route('admin.sliders.index'),
		__('admin.edit') => route('admin.sliders.edit', $slider_item->id),
	],
	])
	@endsection

	@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<h3 class="card-title">{{ __('admin.edit') }}</h3>
				</div>
				@include('admin.pages.slider_items.form', ['slider_item'  => $slider_item])
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