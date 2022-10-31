@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.product_colors.index'),
	'menu'      => [
		__('admin.product_colors.index') => route('admin.product_colors.index'),
	],
	])
	@endsection

	@section('content')
	<div class="card card-custom gutter-b">
		<!--begin::Header-->
		<div class="card-header border-0 py-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label font-weight-bolder text-dark">{{ __('admin.product_colors.index') }}</span>
			</h3>
			<div class="card-toolbar">
				@if(Auth::user()->can('create-product-colors'))
				<a href="{{ route('admin.product_colors.create') }}" class="btn btn-success font-weight-bolder font-size-md">
				{{ __('admin.create') }}</a>
				@endif
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Body-->
		<div class="card-body py-0">
			
			@include('admin.includes.search')
			
			<!--begin::Table-->
			@if($items->count() > 0)
			<div class="table-responsive">
				<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
					<thead>
						<tr>
							<th style="text-align: center;">#</th>
							<th style="text-align: center;">{{ __('admin.Name') }}</th>
							<th style="text-align: center;">{{ __('admin.Color') }}</th>
							<th style="text-align: center;">{{ __('admin.Options') }}</th>
						</tr>
					</thead>
					<tbody>

						@foreach($items as $index => $item)
						<tr>
							<td style="text-align: center;">
								{{ $index+1 }}
							</td>
							<td style="text-align: center;">
								{{ $item->name }}
							</td>
							<td style="text-align: center;">
								<div class="square" style="background-color: {{ $item->color }};"></div>
							</td>
								<td style="text-align: center;">
									@include('admin.includes.actions', [
										'edit'      => route('admin.product_colors.edit', $item->id),
										'destroy'   => route('admin.product_colors.destroy', $item->id),
										'permission'=>'product-colors',
									])
							
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<h2 class="text-center">{{ __('admin.No Data') }}</h2>
				@endif
				
				<!--end::Table-->
			</div>
			<!--end::Body-->
		</div>
		<div class="admin-pagination">
			{{ $items->appends(request()->query())->links() }}
		</div>
		@endsection