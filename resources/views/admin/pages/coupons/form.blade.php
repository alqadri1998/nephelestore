<form method="post" action="{{isset($item) ? route('admin.coupons.update',$item) : route('admin.coupons.store') }}">
    {{ csrf_field() }}
    @if(isset($item))
        @method('PATCH')
    @endif
    <div class="card-body">
        @if(isset($item))
            {{-- for unique validation when edit --}}
            <input type="hidden" name="id" value="{{ $item->id }}">
        @endif
             <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputAddress">{{ t('Coupon')}}</label>
                        <input type="text" class="form-control" id="inputAddress" name="coupon" value="{{ old('coupon') ?? (isset($item) ? $item->coupon : '') }}" required>
                    </div>
                     
                 </div>
                 <div class="col-md-6">
                     <label>{{ t('Discount Type') }} </label>
                    <select class="form-control" name="type">
                            <option value="amount" {{isset($item) && $item->type =='amount'? 'selected':''  }}>{{ t('Amount') }}</option>
                            <option value="percentage" {{isset($item) && $item->type =='percentage'? 'selected':''  }}>{{ t('Percentage') }} %</option>
                        
                        </select>
                 </div>
                
             </div>
             <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">{{ t('Value')}}</label>
                        <input type="number" class="form-control" id="value" name="value" value="{{ old('value') ?? (isset($item) ? $item->value : '') }}" required>
                    </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="value">{{ t('Maximum discount')}}</label>
                        <input type="number" class="form-control" name="maximum_discount" value="{{ old('maximum_discount') ?? (isset($item) ? $item->maximum_discount : '') }}">
                    </div>
                 </div>
             </div>   
        

        <div class="row">
            <div class="col-md-6">
                <label>يعمل على اقسام معينه</label>
                <select class="form-control select2" id="kt_select2_1" name="category_id[]" multiple="multiple">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ isset($item) && in_array($category->id, $item->categories()->pluck('categories.id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>يعمل على منتجات معينه</label>
                    <select class="form-control select2" id="kt_select2_2" name="product_id[]" multiple="multiple">
                        <option value="">اختار</option>
                        
                       @foreach($products as $product)
                        <option value="{{ $product->id }}" 
                            {{ isset($item) && in_array($product->id, $item->products()->pluck('products.id')->toArray()) ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
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
        
        
           

          

          
            
           

       
        

        
    </div>
    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2">{{ isset($item) ? __('admin.update') : __('admin.save')}}</button>
        <a class="btn btn-secondary" href="{{ route('admin.coupons.index') }}">{{ __('admin.cancel') }}</a>
    </div>
</form>