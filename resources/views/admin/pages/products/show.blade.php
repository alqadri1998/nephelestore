@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.products.index'),
	'menu'      => [
		__('admin.products.index') => route(current_guard() . '.products.index'),
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
					<h3 class="card-title font-weight-bolder text-dark">{{ t('View Details') }}</h3>
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{t('Options')}}</a>
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<!--begin::Navigation-->
								<ul class="navi navi-hover">
									<li class="navi-item">
										<a href="{{ route(current_guard() . '.products.edit', $item->id) }}" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-pen text-primary"></i>
											</span>
											<span class="navi-text">{{t('Edit')}}</span>
										</a>
									</li>
									<li class="navi-item">
										<a class="navi-link" onclick="$('.deleteForm').submit()" style="cursor: pointer;">
											<span class="navi-icon">
												<i class="flaticon-delete text-danger"></i>
											</span>
											<span class="navi-text">{{t('Delete')}}</span>
										</a>
										<form method="post" class="deleteForm" action="{{ route(current_guard() . '.products.destroy', $item->id) }}" style="display: inline;" title="Delete">
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
				<div class="card-body py-0">
					<!--begin::Item-->






					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center table-bordered">
									<thead>
										<tr>
											<th colspan="2" class="text-center" style="color:#000 !important;font-weight: bolder !important;">{{t('General Details')}}</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.name_ar') }}</th>
											<th style="text-align: center;">
												{{ $item->translate('ar')->name }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.name_en') }}</th>
											<th style="text-align: center;">
												{{ $item->translate('en')->name }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Description_ar') }}</th>
											<th style="text-align: center;">
												{{ strip_tags($item->translate('ar')->description) }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Description_en') }}</th>
											<th style="text-align: center;">
												{{ strip_tags($item->translate('en')->description) }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Category') }}</th>
											<th style="text-align: center;">
												{{ $item->category ? $item->category->name : ''}}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Stock') }}</th>
											<th style="text-align: center;">
												{{ $item->stock ?: '-' }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Price') }}</th>
											<th style="text-align: center;">
												{{ $item->price ? $item->price . t('currency') : '' }}
											</th>

										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Discount Price') }}</th>
											<th style="text-align: center;">
												{{ $item->discount_price ? $item->discount_price . t('currency') : '' }}
											</th>

										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.Discount Percentage') }}</th>
											<th style="text-align: center;">
												{{ $item->discount_percent ? $item->discount_percent . ' %' : '' }}
											</th>
										</tr>
										
										<tr>
											<th style="text-align: center;">{{ __('admin.status') }}</th>
											<th style="text-align: center;">
												{{ $item->active ? __('admin.active') : __('admin.inactive') }}
											</th>
										</tr>
										<tr>
											<th style="text-align: center;">{{ __('admin.New') }}</th>
											<th style="text-align: center;">
												{{ $item->new ? t('Yes') : t('No') }}
											</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						@if(count($item->getVariants()) > 0)
						<div class="col-md-6">
							<div class="table-responsive">
								<table class="table table-head-custom table-vertical-center table-bordered">
									<thead>
										<tr>
											<th colspan="2" class="text-center" style="color:#000 !important;font-weight: bolder !important;">{{__('admin.Product Variants')}}</th>
										</tr>

										@foreach($item->getVariants() as $variant)
										<tr>
											<th colspan="2">
												<table class="table table-head-custom table-vertical-center table-bordered">
													<tr>
														<th>{{__('admin.Size')}}</th>
														<th>{{ $variant['size'] }}</th>
													</tr>
													<tr>
														<th>{{__('admin.Color')}}</th>
														<th style="color: {{$variant['color']}} !important">{{ $variant['color_name'] }}</th>
													</tr>
													<tr>
														<th>{{__('admin.Stock')}}</th>
														<th>{{ $variant['stock'] }}</th>
													</tr>
													<tr>
														<th>{{__('admin.Price')}}</th>
														<th>{{ $variant['price'] ? $variant['price'] . t('currency') : '' }}</th>
													</tr>
													<tr>
														<th>{{__('admin.Discount Percentage')}}</th>
														<th>{{ $variant['discount_percent'] ? $variant['discount_percent'] . '%' : '' }}</th>
													</tr>
													<tr>
														<th>{{__('admin.Discount Price')}}</th>
														<th>{{ $variant['discount_price'] ? t('currency'). $variant['discount_price'] : '' }}</th>
													</tr>
												</table>
											</th>
										</tr>
										@endforeach
										
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						@endif
					</div>

					
					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Main Image') }}</a>
							@if($item->getFirstMedia('thumb'))
							<img src="{{ url($item->getFirstMedia('thumb')->getFullUrl()) }}" style="width: 300px" class="" alt="" />
							@endif
						</div>
					</div>                    
					<div class="d-flex align-items-center mb-10">
						<div class="d-flex flex-column flex-grow-1 font-weight-bold">
							<a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Images') }}</a>
							@include('admin.includes.other-image-preview', ['name' => 'images[]', 'onlyShow' => true])
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::List Widget 3-->
			</div>
		</div>
		@endsection