<form method="post" action="{{isset($slider_item) ? route('admin.sliders.update',$slider_item) : route('admin.sliders.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@if(isset($slider_item))
	@method('PATCH')
	@endif
	<div class="card-body">
		<div class="form-group row">
			<label style="width: 100%">{{ t('Image','site') }}
				<span style="color: #a70606;margin-right: 20px;">( {{ t('Preferred size', 'site') }} 1920 * 1200 )</span>
			</label>
			<div class="">
				@include('admin.includes.image-preview-slider', ['name' => 'image', 'width' => '1920px'])
				<br>
				<small>{{ t('Recomended Resolution','site') }}: 1920px X 470px</small>
			</div>
		</div>
		{{-- <div class="form-group">
			<label for="arname">{{ __('Overlay Text') }}</label>
			<input type="text" class="form-control" name="overlay_text" value="{{ old('overlay_text') ?? (isset($slider_item) ? $slider_item->overlay_text : '') }}">
		</div> --}}
		{{-- <div class="form-group">
			<label for="arname">{{ __('Url') }}</label>
			<input type="text" class="form-control" name="url" value="{{ old('url') ?? (isset($slider_item) ? $slider_item->url : '') }}">
		</div> --}}
		<div class="col-md-6">                        
			<div class="form-group mb-2">
				<label for="enname" style="display: inline-block;">{{ __('admin.Category') }}</label>
				<select class="form-control" style="min-height: 20px" id="kt_select2_1" name="category_id" required>
					<option value="">{{ __('admin.select') }}</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ isset($item) && $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="">{{ t('Status (Inactive/Active)','site') }}</label>
			<span class="switch switch-lg">
				<label>
					<input type="checkbox" name="active" {{ isset($slider_item)  ? ( $slider_item->active ? 'checked': '')  : 'checked' }}/>
					<span></span>
				</label>
			</span>
		</div>
	</div>
	<div class="card-footer" style="text-align: center;">
		<button type="submit" class="btn btn-primary mr-2">{{ isset($slider_item) ? __('admin.update') : __('admin.save')}}</button>
		<a class="btn btn-secondary" href="{{ route('admin.sliders.index') }}">{{ __('admin.cancel') }}</a>
	</div>
</form>