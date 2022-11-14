@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.products.index'),
	'menu'      => [
		__('admin.products.index') => route('admin.products.index'),
	],
	])
	@endsection

	@section('content')
	<div class="card card-custom gutter-b">
		<!--begin::Header-->
		<div class="card-header border-0 py-5">
			<h3 class="card-title align-items-start flex-column">
				<span class="card-label font-weight-bolder text-dark">{{ __('admin.products.index') }}</span>
			</h3>
			<div class="card-toolbar">
				@if(Auth::user()->can('create-products'))
				<a href="{{ route('admin.products.create') }}" class="btn btn-success font-weight-bolder font-size-md">
				{{ __('admin.create') }}</a>
				@endif
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Body-->
		<div class="card-body py-0">

			@include('admin.includes.search')
			<div style="margin: 20px">
				<hr>
				<h3 style="text-align: center;">
					<span>{{ t('Filters') }}</span>
				</h3>
				<hr>
				<form action="" style="display: block" id="">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>{{ t('Category') }}</label>
								<select class="form-control select2" id="kt_select2_1" name="category_id[]" multiple="multiple">
									@foreach($categories as $category)
									<option value="{{ $category->id }}" {{ isset($_GET['category_id']) && in_array($category->id, $_GET['category_id']) ? 'selected' : '' }}>{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3 status-select2">
							<div class="form-group">
								<label>{{ t('Status') }}</label>
								<select class="form-control select2" id="kt_select2_2" name="status">
									<option value="">{{t('all')}}</option>

									<option value="active" {{ isset($_GET['status']) &&  $_GET['status'] == 'active' ? 'selected' : '' }}>{{ t('Active') }}</option>
									<option value="{{ 'inactive' }}" {{ isset($_GET['status']) &&  $_GET['status'] == 'inactive' ? 'selected' : '' }}>{{ t('Inactive') }}</option>

								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>{{ t('Date Created From') }}</label>
								<input type="text" class="form-control" id="kt_datepicker_1"  name="date_from" value="{{ isset($_GET['date_from']) ? $_GET['date_from'] : ''}}" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>{{ t('Date Created To') }}</label>
								<input type="text" class="form-control" id="kt_datepicker_2"  name="date_to" value="{{ isset($_GET['date_to']) ? $_GET['date_to'] : ''}}" />
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-success" value="{{ t('Filter') }}">
							<a href="{{ route('admin.products.index') }}" class="btn btn-warning">{{ t('Reset Filters') }}</a>
						</div>
					</div>
				</form>
			</div>
			<!--begin::Table-->
			@if($items->count() > 0)

			<div class="table-responsive">
				<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
					<thead>
						<tr>
							<th style="text-align: center;">#</th>
							<th style="text-align: center;">Slug</th>
							<th>{{ t('Image') }}</th>
							<th style="text-align: center;">{{ t('Name Ar') }}</th>
							<th style="text-align: center;">{{ t('Name En') }}</th>
							<th style="text-align: center;">{{ __('admin.Category') }}</th>
							<th style="text-align: center;">{{ t('Price') }}</th>
							<th style="text-align: center;">{{ t('Special Price') }}</th>
							<th style="text-align: center;">{{ t('Stock') }}</th>
							<th style="text-align: center;">{{ __('admin.status') }}</th>

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
								{{ $item->slug }}
							</td>
							 <td>
							 	@if($item->getFirstMedia('thumb'))
		                        	<img src="{{ $item->getFirstMedia('thumb') ? $item->getFirstMedia('thumb')->getFullUrl():'' }}" width="100" height="100px">
		                        @endif
		                    </td>
							<td style="text-align: center;">
								{{ $item->translate('ar')->name }}
							</td>
							<td style="text-align: center;">
								{{ $item->translate('en')->name }}
							</td>
							<td style="text-align: center;">
								{{ $item->category ? $item->category->name : ''}}
							</td>
							<td style="text-align: center;">
								{{ $item->price }}
							</td>
							<td style="text-align: center;">
								{{ $item->special_price ?? '-' }}
							</td>
							<td style="text-align: center;">
								{{ $item->stock }}
							</td>

							<td style="text-align: center;">
								{{ $item->active ? __('admin.active') : __('admin.inactive') }}
							</td>


						<td style="text-align: center;">
								{{-- 'show'      => route('admin.products.show', $item->id), --}}
							@include('admin.includes.actions', [
								'edit'      => route('admin.products.edit', $item->id),
								'destroy'   => route('admin.products.destroy', $item->id),
								'permission'=> 'products'
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
		{{ $items->appends(request()->query())->links() }}
	</div>
	@endsection

	@section('scripts')
	<script src="{{ url('assets/admin/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
	@endsection
