<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                @include('admin.includes.product_step', [
                                    'title' => t('General Details'),
                                    'last' => false,
                                    'icon' => 'wizard-icon flaticon-interface-10',
                                ])
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                @include('admin.includes.product_step', [
                                    'title' => t('Category & Properties'),
                                    'last' => false,
                                    'icon' => 'wizard-icon flaticon2-pie-chart-3',
                                ])
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" id="product-variants-step">
                                @include('admin.includes.product_step', [
                                    'title' => t('Product Variants'),
                                    'last' => false,
                                    'icon' => 'wizard-icon flaticon2-layers-2',
                                ])
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav images-->
                            <div class="wizard-step" data-wizard-type="step">
                                @include('admin.includes.product_step', [
                                    'title' => t('Product Package'),
                                    'last' => false,
                                    'icon' => 'wizard-icon flaticon2-delivery-package',
                                ])
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                @include('admin.includes.product_step', [
                                    'title' => t('Product Images'),
                                    'last' => false,
                                    'icon' => 'wizard-icon flaticon2-photograph',
                                ])
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                            <!--begin::Wizard Step 5 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                @include('admin.includes.product_step', [
                                    'title' => t('Others'),
                                    'last' => true,
                                    'icon' => 'wizard-icon flaticon2-console',
                                ])
                            </div>
                            <!--end::Wizard Step 5 Nav-->
                        </div>
                        <!--/wizard-steps-->
                    </div>
                    <!--/wizard-nav-->
                    <!--end::Wizard Nav-->
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-12">
                            <form class="form" id="kt_form" method="post"
                                action="{{ isset($item) ? route('admin.products.update', $item->id) : route('admin.products.store') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (isset($item))
                                    @method('PUT')
                                @endif
                                {{-- name and discription --}}
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    {{-- name --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="arname">{{ t('Name Ar') }}</label>
                                                <input type="text" class="form-control" id="arname"
                                                    name="ar[name]"
                                                    value="{{ old('ar.name') ?? (isset($item) ? $item->translate('ar')->name : '') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="arname">{{ t('Name En') }}</label>
                                                <input type="text" class="form-control" id="enname"
                                                    name="en[name]"
                                                    value="{{ old('en.name') ?? (isset($item) ? $item->translate('en')->name : '') }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Row-->

                                    {{-- /descriptions --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="arname">{{ t('Price') }}</label>
                                                <input type="number" step="any" class="form-control" name="price"
                                                    id="priceInput"
                                                    value="{{ old('price') ?? (isset($item) ? $item->price : '') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="special_price">{{ t('Special Price') }}</label>
                                                <input type="number" step="any" class="form-control"
                                                    name="special_price" id="special_price"
                                                    value="{{ old('special_price') ?? (isset($item) ? $item->special_price : '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Description EN --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="ardescription">{{ t('Description Ar') }}</label>
                                                <textarea class="summernote form-control" id="ardescription" rows="10" name="ar[description]">{{ old('ar.description') ?? (isset($item) ? $item->translate('ar')->description : '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Description AR --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="ardescription">{{ t('Description En') }}</label>
                                                <textarea class="summernote form-control" id="endescription" rows="50" name="en[description]">{{ old('en.description') ?? (isset($item) ? $item->translate('en')->description : '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{-- category and attributes --}}
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label for="enname"
                                                    style="display: inline-block;">{{ __('admin.Category') }}</label>
                                                <select class="form-control" id="kt_select2_1" name="category_id">
                                                    <option value="">{{ __('admin.select') }}</option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            data-has-attributes="{{ $category->include_sizes_colors }}"
                                                            value="{{ $category->id }}"
                                                            {{ isset($item) && $item->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4 stockDiv">
                                            <div class="form-group mb-2">
                                                <label for="aptice">{{ __('admin.Stock') }}</label>
                                                <input type="number" class="form-control" name="stock"
                                                    value="{{ old('stock') ?? (isset($item) ? $item->stock : '') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 stockDiv">
                                            <div class="form-group mb-2">
                                                <label for="aptice">{{ __('admin.weight_by_kg') }}</label>
                                                <input type="number" step="any" class="form-control"
                                                    name="weight"
                                                    value="{{ old('weight') ?? (isset($item) ? $item->weight : '') }}">
                                            </div>
                                        </div>


                                    </div>
                                    <!--/row-->

                                </div>
                                <!--/pb-5-->
                                <div class="pb-5" data-wizard-type="step-content" id="product-variants-content">
                                    <div class="row mb-5">
                                        <div class="col-md-12" style="text-align: right;">
                                            <button type="button"
                                                class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4 btn-add-variant">{{ t('Add New Variant') }}</button>
                                        </div>
                                    </div>
                                    @include('admin.includes.product_variants', [
                                        'product' => isset($item) ? $item : null,
                                        'productSizesValues' => isset($productSizesValues)
                                            ? $productSizesValues
                                            : null,
                                    ])
                                </div>
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="form-group row">
                                        <label style="width: 100%">{{ t('Package  Main Product') }}
                                            <span style="color: #a70606;margin-right: 20px;"></span>
                                        </label>

                                        <span class="switch switch-lg">
                                            <label>
                                                <input type="checkbox" onclick="packageCheck()" name="main_package"
                                                    id='main_package'
                                                    @if (isset($item)) @if ($item->pag_id == 0)
                                                                checked

                                                                @else @endif
                                                @else checked @endif
                                                />
                                                <span></span>
                                            </label>
                                        </span>

                                    </div>
                                    <div class="form-group row" id="sub_package">
                                        <label style="width: 100%">{{ t('Package Sub Product ') }}
                                            <span style="color: #a70606;margin-right: 20px;"></span>
                                        </label>
                                        <select class="form-control" name="sub_package">
                                            <option value="">اختار</option>

                                            @foreach ($products as $product)
                                                <option
                                                    value="{{ $product->id }}" @isset($item)
                                                {{ $item->pag_id == $product->id ? 'selected' : '' }}
                                            @endisset >
                                                    {{ $product->name }} ({{ $product->slug ?? 'No Slug' }})</option>
                                            @endforeach

                                        </select>


                                    </div>
                                </div>
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="form-group row">
                                        <label style="width: 100%">{{ t('Product Main Image') }}
                                            <span style="color: #a70606;margin-right: 20px;">(
                                                {{ t('Preferred size', 'site') }} 300 * 300)</span>
                                        </label>
                                        <div class="">
                                            {{-- @include('admin.includes.image-preview', ['name' => 'thumb']) --}}
                                            @if (isset($item) && $item->getFirstMedia('thumb'))
                                                @include('admin.includes.image-preview-media', [
                                                    'path' => $item->getFirstMedia('thumb')->getFullUrl(),
                                                    'name' => 'thumb',
                                                ])
                                            @else
                                                @include('admin.includes.image-preview-media', [
                                                    'name' => 'thumb',
                                                ])
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="width: 100%">{{ t('Other Images') }}
                                            <span style="color: #a70606;margin-right: 20px;">(
                                                {{ t('Preferred size', 'site') }} 600 * 600)</span>
                                        </label>
                                        @include('admin.includes.other-image-preview', [
                                            'name' => 'images[]',
                                        ])
                                    </div>
                                </div>
                                <!--/pb-5-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">

                                                <label
                                                    class="col-3 col-form-label">{{ t('Status (Inactive/Active)') }}</label>
                                                <div class="col-3">
                                                    <span class="switch switch-lg">
                                                        <label>
                                                            <input type="checkbox" name="active"
                                                                {{ isset($item) && $item->active ? 'checked' : '' }} />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            @if (!isset($item))
                                                <div class="form-group">

                                                    <label class="col-3 col-form-label">حفظ في شركه الشحن </label>
                                                    {{-- <label
                                                    class="col-3 col-form-label">{{ t('Status (Inactive/Active)') }}</label> --}}
                                                    <div class="col-3">
                                                        <span class="switch switch-lg">
                                                            <label>
                                                                <input type="checkbox" name="shipping_store" />
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="row">
                                        {{-- New --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-3 col-form-label">{{ t('New') }}</label>
                                                <div class="col-3">
                                                    <span class="switch switch-lg">
                                                        <label>
                                                            <input type="checkbox" name="new"
                                                                {{ isset($item) && $item->new ? 'checked' : '' }} />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- featured --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-12 col-form-label">{{ t('Featured') }}</label>
                                                <div class="col-12">
                                                    <span class="switch switch-lg">
                                                        <label>
                                                            <input type="checkbox" name="featured"
                                                                {{ isset($item) && $item->featured ? 'checked' : '' }} />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--end::Wizard Step 5-->
                                <!--begin::Wizard Actions-->

                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button"
                                            class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-prev">{{ __('admin.Previous') }}</button>
                                        <a class="btn btn-secondary text-uppercase px-9 py-4"
                                            href="{{ route('admin.products.index') }}">{{ t('Cancel') }}</a>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-submit">{{ isset($item) ? __('admin.Update') : __('admin.Submit') }}</button>
                                        <button type="button"
                                            class="btn btn-primary btn-next font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-next">{{ __('admin.Next') }}</button>
                                    </div>
                                </div>

                                <!--end::Wizard Actions-->
                            </form>
                            <table>
                                <tbody>
                                    <tr class="variant-tr" style="display:none;">
                                        <td style="text-align: center;width: 15%;">
                                            <select class="form-control" name="variants[size][]">
                                                <option value="">{{ __('admin.select') }}</option>
                                                @foreach ($productSizes as $si)
                                                    <option value="{{ $si->id }}">{{ $si->size }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align: center;width: 15%;">
                                            <select class="form-control color-variant" name="variants[color][]">
                                                <option value="">{{ __('admin.select') }}</option>
                                                @foreach ($productColors as $co)
                                                    <option value="{{ $co->id }}">{{ $co->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align: center;width: 15%;">
                                            <input type="text" value="" class="form-control"
                                                name="variants[stock][]">
                                        </td>
                                        <td style="text-align: center;width: 15%;">
                                            <input type="text" value="" class="form-control"
                                                name="variants[price][]">
                                        </td>

                                        {{-- <td style="text-align: center;width: 20%;" class="input-td">
												<div class="img-container-colors" style="display:none">
												    @include('admin.includes.color-image-preview', ['name' => 'variants[img][]'])
												</div>
											</td> --}}
                                        <td style="text-align: center;width: 2%;">
                                            <button class="btn btn-danger btnDelete">{{ __('admin.Delete') }}</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--end::Wizard Form-->
                        </div>
                    </div>
                    <!--end::Wizard Body-->
                </div>
                <!--end::Wizard-->
            </div>
            <!--end::Wizard-->
        </div>
    </div>
    <!--end::Container-->
</div>
