<div class="image-input image-input-outline kt_image_colors" id="kt_image_color">
	<div class="image-input-wrapper" style="background-image: url({{ isset($path) ? url($path) : '/assets/admin/media/placeholder.png' }}); width: 80px; height: 80px;"></div>
	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
		<i class="fa fa-pen icon-sm text-muted"></i>
		<input type="file" name="{{$name}}" accept=".png, .jpg, .jpeg" />
	</label>
	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
		<i class="ki ki-bold-close icon-xs text-muted"></i>
	</span>
</div>