<form method="post" action="{{isset($item) ? route('admin.product_colors.update',$item->id) : route('admin.product_colors.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@if(isset($item))
	@method('PATCH')
	<input type="hidden" name="color_id" value="{{$item->id}}">
	@endif

	<div class="card-body">
		{{-- name --}}
		<div class="form-group half-width">
			<label for="inputAddress">{{ __('admin.Name') }}</label>
			<input type="text" class="form-control" id="inputAddress" name="name" value="{{ old('name') ?? (isset($item) ? $item->name : '') }}" required >
		</div>            
		{{-- color --}}
		<div class="form-group half-width">
			<label for="inputAddress">{{ __('admin.Color') }}</label>
			<input class="form-control" type="color" value="{{ isset($item) && $item->color ? $item->color : '#ff0000' }}" name="color" id="example-color-input">
		</div>
	</div>
	<div class="card-footer" style="text-align: center;">
		<button type="submit" class="btn btn-primary mr-2">{{ isset($item) ? __('auth.update') : __('auth.save')}}</button>
		<a class="btn btn-secondary" href="{{ route('admin.product_colors.index') }}">{{ __('admin.cancel') }}</a>
	</div>
</form>


