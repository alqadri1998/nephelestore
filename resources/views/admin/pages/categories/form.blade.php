<form method="post" action="{{isset($item) ? route('admin.categories.update',$item->id) : route('admin.categories.store') }}" enctype="multipart/form-data">
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
                @if(count($categories))
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">{{ t('Main Category') }}</label>
                        <select class="form-control" id="kt_select2_1" name="parent_id">
                            <option value="">{{ t('select') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ isset($item) && $item->parent_id == $category->id ? 'selected': '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">{{ __('admin.status_active_deactive') }}</label>
                        <div class="">
                            <span class="switch switch-lg">
                                <label>
                                    <input type="checkbox" name="active" {{ isset($item) ? ($item->active ? 'checked' : '')  : 'checked' }}/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label style="width: 100%">{{ t('Thumbinal Image','site') }}
                        <span style="color: #a70606;margin-right: 20px;">( {{ t('Preferred size', 'site') }} 320 * 320)</span>
                    </label>
                    @if(isset($item) && $item->getFirstMedia('thumb'))
                        @include('admin.includes.image-preview-media', ['path' => $item->getFirstMedia('thumb')->getFullUrl(),'name'=>'thumb'])
                    @else
                        @include('admin.includes.image-preview-media',['name'=>'thumb'])
                    @endif
              </div>
          </div>
          <br>
             <div class="row">
                <div class="col-md-12">
                    <label style="width: 100%">{{ t('Backgroun Image','site') }}
                        <span style="color: #a70606;margin-right: 20px;">( {{ t('Preferred size', 'site') }} 1920 * 300)</span>
                    </label>
                    @if(isset($item) && $item->image)
                    @include('admin.includes.image-preview-background', ['name' => 'image', 'path'=>url($item->image)])
                    @else
                        @include('admin.includes.image-preview-background', ['name' => 'image'])
                    @endif
                </div>
                
            </div>
        </div>
    </div>
    @if(isset($item))
        {{-- for unique validation when edit --}}
        <input type="hidden" name="category_id" value="{{ $item->id }}">
    @endif
    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2 submitBtn">{{ isset($item) ? t('Update') : t('Save')}}</button>
        <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}">{{ t('Cancel') }}</a>
    </div>
</form>


