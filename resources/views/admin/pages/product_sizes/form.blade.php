<form method="post" action="{{isset($item) ? route('admin.product_sizes.update',$item->id) : route('admin.product_sizes.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@if(isset($item))
	@method('PATCH')
	<input type="hidden" name="size_id" value="{{$item->id}}">
	@endif

	<div class="card-body">
		<div class="form-group half-width">
			<label for="inputAddress">{{ t('Size') }}</label>
			<input type="text" class="form-control" id="inputAddress" name="size" value="{{ old('size') ?? (isset($item) ? $item->size : '') }}" required >
		</div>      
	</div>
	<div class="card-footer" style="text-align: center;">
		<button type="submit" class="btn btn-primary mr-2">{{ isset($item) ? __('auth.update') : __('auth.save')}}</button>
		<a class="btn btn-secondary" href="{{ route('admin.product_sizes.index') }}">{{ __('admin.cancel') }}</a>
	</div>
</form>


