@extends('admin.layouts.app')

@section('head')
    <style>

    </style>
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title' => __('admin.create'),
        'menu' => [
            __('admin.products.index') => route('admin.products.index'),
            __('admin.create') => route('admin.products.create'),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.create') }}</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <div class="card card-custom">
                                <div class="card-body p-0">
                                    <!--begin::Wizard-->
                                    <form method="post"
                                        action="{{ isset($item) ? route('admin.coupons.update', $item) : route('admin.coupons.store') }}">
                                        {{ csrf_field() }}
                                        @if (isset($item))
                                            @method('PATCH')
                                        @endif
                                        <div class="card-body">
                                            @if (isset($item))
                                                {{-- for unique validation when edit --}}
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                            @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputAddress">{{ t('Coupon') }}</label>
                                                        <input type="text" class="form-control" id="inputAddress"
                                                            name="coupon"
                                                            value="{{ old('coupon') ?? (isset($item) ? $item->coupon : '') }}"
                                                            required>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label>{{ t('Discount Type') }} </label>
                                                    <select class="form-control" name="type">
                                                        <option value="amount"
                                                            {{ isset($item) && $item->type == 'amount' ? 'selected' : '' }}>
                                                            {{ t('Amount') }}</option>
                                                        <option value="percentage"
                                                            {{ isset($item) && $item->type == 'percentage' ? 'selected' : '' }}>
                                                            {{ t('Percentage') }} %</option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="value">{{ t('Value') }}</label>
                                                        <input type="number" class="form-control" id="value"
                                                            name="value"
                                                            value="{{ old('value') ?? (isset($item) ? $item->value : '') }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="value">{{ t('Maximum discount') }}</label>
                                                        <input type="number" class="form-control" name="maximum_discount"
                                                            value="{{ old('maximum_discount') ?? (isset($item) ? $item->maximum_discount : '') }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>يعمل على اقسام معينه</label>
                                                    <select class="form-control select2" id="kt_select2_1"
                                                        name="category_id[]" multiple="multiple">
                                                        {{-- @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ isset($item) &&in_array($category->id,$item->categories()->pluck('categories.id')->toArray())? 'selected': '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>يعمل على منتجات معينه</label>
                                                        <select class="form-control select2" id="kt_select2_2"
                                                            name="product_id[]" multiple="multiple">
                                                            <option value="">اختار</option>

                                                            {{-- @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"
                                                                    {{ isset($item) &&in_array($product->id,$item->products()->pluck('products.id')->toArray())? 'selected': '' }}>
                                                                    {{ $product->name }}</option>
                                                            @endforeach --}}

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="col-form-label">{{ __('admin.status_active_deactive') }}</label>
                                                        <div class="">
                                                            <span class="switch switch-lg">
                                                                <label>
                                                                    <input type="checkbox" name="active"
                                                                        {{ isset($item) ? ($item->active ? 'checked' : '') : 'checked' }} />
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>














                                        </div>
                                        <div class="card-footer" style="text-align: center;">
                                            <button type="submit"
                                                class="btn btn-primary mr-2">{{ isset($item) ? __('admin.update') : __('admin.save') }}</button>
                                            <a class="btn btn-secondary"
                                                href="{{ route('admin.coupons.index') }}">{{ __('admin.cancel') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.pages.products.wizard-1')
    <script src="{{ url('assets/admin/js/pages/crud/forms/editors/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();
                KTWizard1.init();
            });

            $('.btn-add-variant').click(function(e) {
                e.preventDefault();
                var row = $('.variant-tr').first().clone();
                $(row).css('display', 'table-row');
                $(row).removeClass('variant-tr');
                $('#kt_advance_table_widget_1').append(row);
                KTWizard1.init();
                fixImages();
            });

            $('.btn-next').click(function(e) {
                $('#kt_select2_1, #kt_select2_2, #kt_select2_3, #kt_select2_4').select2({
                    placeholder: 'إختر'
                });
                // checkVariantsVisibility();
            });
            $('.btn-prev').click(function(e) {
                $('#kt_select2_1, #kt_select2_2, #kt_select2_3, #kt_select2_4').select2({
                    placeholder: 'إختر'
                });
                // checkVariantsVisibility();
            });
            // $('.uppy-DragDrop-label').html('قم بسحب الصور وافلاتها او إضغط هنا')
            $('.btnAddImg').click(function() {
                var el = $('#kt_image').clone();
                var id = el.attr('id') + Math.random().toString(36).substring(7);
                el.attr('id', id);
                el.removeAttr('hidden');
                $('.img-container').append(el);
                new KTImageInput(id);
            });

            $('.sizeInput').change(function() {
                if ($(this).val() < 1) {
                    $(this).val(1)
                }
            })

            // $('body').on('change', '.color-variant', function() {
            // 	if($(this).val() == ''){
            // 		$(this).parents('tr').find('.input-td .img-container-colors').css('display', 'none');
            // 	}else{
            // 		$(this).parents('tr').find('.input-td .img-container-colors').css('display', 'block');
            // 	}
            // 	fixImages();
            // })

            // $('#kt_select2_1').change(function () {
            //     	checkVariantsVisibility();
            //     	getBrands();
            // });
        });

        function fixImages() {
            $('.kt_image_colors').each(function(item, img) {
                id = 'kt_' + Math.random().toString(36).substring(7);
                $(img).attr('id', id);
                new KTImageInput(id);
            })
        }
        // function checkVariantsVisibility(){
        //     	if($('option:selected', '#kt_select2_1').attr('data-has-attributes') == false){
        // 		$('#product-variants-step').removeAttr('data-wizard-type');
        // 		$('#product-variants-step').css('display', 'none');

        // 		$('#product-variants-content').removeAttr('data-wizard-state');
        // 		$('#product-variants-content').removeAttr('data-wizard-type');
        // 		$('#product-variants-content').removeClass('pb-5');
        // 		$('#product-variants-content').css('display', 'none');
        // 		$('.stockDiv').css('display', 'block');
        //     	}else{
        //     		$('#product-variants-step').attr('data-wizard-type', 'step');
        //     		$('#product-variants-step').css('display', 'flex');
        //     		$('#product-variants-content').attr('data-wizard-type', 'step-content');
        //     		$('#product-variants-content').addClass('pb-5');
        //     		$('#product-variants-content').removeAttr('style');
        // 		$('.stockDiv').css('display', 'none');
        //     	}
        // }
        // function getBrands() {
        // 	let url = window.location.origin;
        // 	let productId = $('#kt_select2_1').val();
        // 		console.log(productId);
        // 	if(productId != undefined && productId != ''){
        // 		let ajaxCall = Commander.ajax(url + '/marketer/brands/' + productId);
        // 		if(ajaxCall.response.status.code == 200){
        // 			let data = ajaxCall.response.data;
        // 			if(data.length > 0){
        // 				data.forEach((item) => {
        // 					$('#kt_select2_2').append('<option value="' + item.id + '" > ' + item.name + '</option>');
        // 				});
        // 			}
        // 		}
        // 	}
        // }
    </script>
@endsection
