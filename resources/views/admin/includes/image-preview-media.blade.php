<div class="image-input image-input-outline" id="kt_image_1">
    <div class="image-input-wrapper" style="background-image: url({{ isset($path) ? $path : '/assets/admin/media/placeholder.png' }}); width: 200px; height: 200px;"></div>
    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
        <i class="fa fa-pen icon-sm text-muted"></i>
        <input type="file" name="{{ isset($name) ? $name : 'image' }}" accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="profile_avatar_remove" />
    </label>
    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
        <i class="ki ki-bold-close icon-xs text-muted"></i>
    </span>
</div>