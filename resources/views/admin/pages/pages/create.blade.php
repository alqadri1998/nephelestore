@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.create'),
	'menu'      => [
		__('admin.pages.index') => route('admin.pages.index'),
		__('admin.create') => route('admin.pages.create'),
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
				@include('admin.pages.pages.form')
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script src="{{url('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
	<script>
		
	</script>
	@endsection