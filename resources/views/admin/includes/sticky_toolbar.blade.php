<?php 
	$categories = \App\Category::where('active', true)->get();
?>
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-9 pb-9 mt-4 slideDown">
	<form action="" style="display: block;width: 100%;">
		<div class="row">
			<div class="col-md-12 mb-4">
			    <div class="row align-items-center">
			        <div class="col-md-12 my-2 my-md-0">
			            <div class="input-icon">
			                    <input type="text" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" name="search" class="form-control" placeholder="{{t('Search')}}">
			                    <span><i class="flaticon2-search-1 text-muted"></i></span>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label style="display:block;">{{ t('marketing specialize') }}</label>
					<select class="form-control select2" id="kt_select2_1" name="category_id[]" multiple="multiple">
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ isset($_GET['category_id']) && in_array($category->id, $_GET['category_id']) ? 'selected' : '' }}>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<input type="submit" class="btn btn-success" value="{{ t('Filter') }}">
				<a href="{{ route('admin.home') }}" class="btn btn-warning">{{ t('Reset Filters') }}</a>
			</div>
		</div>
	</form>
</ul>