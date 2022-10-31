<div class="img-container">
	<div class="image-input image-input-outline" style="margin: 10px;" hidden id="kt_image">
	    <div class="image-input-wrapper" style="background-image: url(/assets/admin/media/placeholder.png)"></div>
	    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
	        <i class="fa fa-pen icon-sm text-muted"></i>
	        <input type="file" name="{{ isset($name) ? $name : 'images[]' }}" accept=".png, .jpg, .jpeg" />
	        <input type="hidden" name="profile_avatar_remove" />
	    </label>
	    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
	        <i class="ki ki-bold-close icon-xs text-muted"></i>
	    </span>
	</div>
	@if(!isset($item))
	<div class="image-input image-input-outline" style="margin: 10px;" id="kt_image_2">
	    <div class="image-input-wrapper" style="background-image: url(/assets/admin/media/placeholder.png)"></div>
	    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
	        <i class="fa fa-pen icon-sm text-muted"></i>
	        <input type="file" name="{{ isset($name) ? $name : 'images[]' }}" accept=".png, .jpg, .jpeg" />
	        <input type="hidden" name="profile_avatar_remove" />
	    </label>
	    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
	        <i class="ki ki-bold-close icon-xs text-muted"></i>
	    </span>
	</div>
	@else
		@foreach($item->getMedia('images') as $img)
			<div class="image-input image-input-outline" style="margin: 10px;" id="kt_image_{{ intval($img->id) + 25 }}">
			    <div class="image-input-wrapper" style="background-image: url({{ $img->getFullUrl() }})"></div>
			    @if(!isset($onlyShow))
				    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip ">
				        
				        <i data-route="{{ route('admin.deleteMedia', $img) }}" class="ki ki-bold-close icon-xs text-muted deleteImgIcon" title="Remove Image"></i>
				        
				        <input type="hidden" name="profile_avatar_remove" />
				    </label>
			    @endif
			</div>
		@endforeach
	@endif
</div>
@if(!isset($onlyShow))
	<div style="width: 100%">
		<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4 btnAddImg">{{ t('Add New Image') }}</button>
	</div>
@endif