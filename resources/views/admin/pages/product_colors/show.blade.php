@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.product_colors.index'),
	'menu'      => [
		__('admin.product_colors.index') => route(current_guard() . '.product_colors.index'),
	],
	])
	@endsection

	@section('content')
	<div class="row">
		<div class="col-xl-12">
			<!--begin::List Widget 3-->
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Header-->
				<div class="card-header border-0">
					<h3 class="card-title font-weight-bolder text-dark">View Details</h3>
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">خيارات</a>
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<!--begin::Navigation-->
								<ul class="navi navi-hover">
									<li class="navi-item">
										<a href="{{ route(current_guard() . '.product_colors.edit', $item->id) }}" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-pen text-primary"></i>
											</span>
											<span class="navi-text">Edit</span>
										</a>
									</li>
									<li class="navi-item">
										<a class="navi-link" onclick="$('.deleteForm').submit()" style="cursor: pointer;">
											<span class="navi-icon">
												<i class="flaticon-delete text-danger"></i>
											</span>
											<span class="navi-text">Delete</span>
										</a>
										<form method="post" class="deleteForm" action="{{ route(current_guard() . '.product_colors.destroy', $item->id) }}" style="display: inline;" title="Delete">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE" />
										</form>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2">
					<!--begin::Item-->
					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.ar_name') }}</a>
							<span class="text-muted">{{ $item->translate('ar')->name }}</span>
						</div>
					</div>
					@if($item->translate('ar')->description)
					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.ar_discription') }}</a>
							<span class="text-muted">{{ $item->translate('ar')->description }}</span>
						</div>
					</div>
					@endif

					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.en_name') }}</a>
							<span class="text-muted">{{ $item->translate('en')->name }}</span>
						</div>
					</div>
					@if($item->translate('en')->description)
					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('admin.en_discription') }}</a>
							<span class="text-muted">{{ $item->translate('en')->description }}</span>
						</div>
					</div>
					@endif
					<!--end::Body-->
				</div>
				<!--end::List Widget 3-->
			</div>
		</div>
		@endsection