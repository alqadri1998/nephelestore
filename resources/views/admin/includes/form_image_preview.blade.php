<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">{{ __('صورة') }}</span>
    </div>
    <div class="custom-file">
        <input id="imgInp" type="file" name="image" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" id="imgInp" />
        <label class="custom-file-label" for="inputGroupFile01">{{ __('auth.Choose file') }}</label>
    </div>
</div>
@if($item && $item->getFirstMedia('logo'))
    <?php $image = $item->getFirstMedia('logo'); ?>
    <div class="text-center">
        <img class="img-thumbnail" style="width: 400px;margin-bottom: 20px;" src="{{ url('/uploads/media/'. $image->id .'/'.$image->file_name) }}" alt="admin"width="120" id="blah">
    </div>
@else
    <div class="text-center">
        <img class="img-thumbnail" style="width: 400px;margin-bottom: 20px;display: none" src="" alt="admin"width="120" id="blah">
    </div>
@endif