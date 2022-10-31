<form method="post" action="{{isset($item) ? route('admin.pages.update',$item->id) : route('admin.pages.store') }}">
    {{ csrf_field() }}
    @if(isset($item))
        @method('PATCH')
    @endif

    <div class="card card-custom">

        <div class="card-body">

            <div class="row">
                {{-- name ar --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputAddress">{{ __('admin.ar_name') }}</label>
                        <input type="text" class="form-control" id="ar-name" name="ar[name]" value="{{ old('ar.name') ?? (isset($item) ? $item->translate('ar')->name : '') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- name en --}}
                    <div class="form-group">
                        <label for="inputAddress">{{ __('admin.en_name') }}</label>
                        <input type="text" class="form-control" id="en-name" name="en[name]" value="{{ old('en.name') ?? (isset($item) ? $item->translate('en')->name : '') }}" dir="ltr">
                    </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">{{ t('Content Ar') }}</label>
                        <textarea name="ar[body]" class="summernote" id="kt_summernote_1">
                            {{ old('ar.body') ?? (isset($item) ? $item->translate('ar')->body : '') }}
                        </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label">{{ t('Content En') }}</label>
                        <textarea name="en[body]" class="summernote" id="kt_summernote_1">
                            {{ old('en.body') ?? (isset($item) ? $item->translate('en')->body : '') }}
                        </textarea>
                    </div>
                </div>
            </div>
            
        
        </div>
    </div>
    @if(isset($item))
        {{-- for unique validation when edit --}}
        <input type="hidden" name="page_id" value="{{ $item->id }}">
    @endif
    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2 submitBtn">{{ isset($item) ? t('Update') : t('Save')}}</button>
        <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}">{{ t('Cancel') }}</a>
    </div>
</form>


