@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.sliders.index'),
	'menu'      => [
		__('admin.sliders.index') => route('admin.sliders.index'),
	],
	])
	@endsection

	@section('content')
	<div class="card card-custom gutter-b">
		<!--begin::Header-->
		<div class="card-header border-0 py-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label font-weight-bolder text-dark">{{ __('admin.sliders.index') }}</span>
			</h3>
			<div class="card-toolbar">
				@if(Auth::user()->can('create-slider_items'))
				<a href="{{ route('admin.sliders.create') }}" class="btn btn-success font-weight-bolder font-size-md">
				{{ __('admin.create') }}</a>
				@endif
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Body-->
		<div class="card-body py-0">
			
			
			<!--begin::Table-->
			@if($slider_items->count() > 0)

			<div class="table-responsive">
				<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
					<thead>
						<tr>
							<th style="text-align: center;">#</th>
							<th style="text-align: center;">{{ __('admin.admins.Image') }}</th>
							<th style="text-align: center;">{{ t('Category','site') }}</th>
							<th style="text-align: center;">{{ t('Url','site') }}</th>
							<th style="text-align: center;">{{ __('admin.active') }}</th>
							<th style="text-align: center;">{{ __('admin.Options') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($slider_items as $index=>$slider_item)
						<tr>
							<td>{{ $index+1 }}</td>
							<td style="text-align: center;vertical-align: middle;">
								@if($slider_item->path)
								<img width="auto" height="100px" src="{{ url($slider_item->path) }}" alt="">
								@endif
							</td>
							
							<td style="text-align: center;">
								{{ $slider_item->category ?$slider_item->category->name : '-' }}
							</td>
							<td style="text-align: center;">
								{{ $slider_item->url ?url($slider_item->url) : '-' }}
							</td>
							{{-- <td style="text-align: center;">
								@if($slider_item->url)
								<a href="{{ $slider_item->url }}" target="_blank">Url</a>
								@else
								-
								@endif
							</td> --}}
							<td style="text-align: center;">
								{{ $slider_item->active ? t('Active','site') : t('Inactive','site') }}
							</td>
							<td style="text-align: center;">
								@include('admin.includes.actions', [
									'edit'      => route('admin.sliders.edit', $slider_item->id),
									'destroy'   => route('admin.sliders.destroy', $slider_item->id),
									'permission'=> 'slider_items'
									])
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!--end::Table-->
				@else
				<h2 class="text-center">{{ __('admin.No Data') }}</h2>
				@endif
			</div>
			<!--end::Body-->
		</div>
		<div class="admin-pagination">
			{{ $slider_items->appends(request()->query())->links() }}
		</div>
		@endsection