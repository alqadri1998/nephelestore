<div class="table-responsive">
    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
        <thead>
            <tr>
                <th style="text-align: center;">{{ __('admin.products.size') }}</th>
                <th style="text-align: center;">{{ __('admin.products.price') }}</th>
                <th style="text-align: center;">{{ __('admin.products.quantity') }}</th>
                <th style="text-align: center;">{{ __('admin.Options') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @if(isset($productSizesValues))
                {{-- update --}}
                @foreach($productSizes as $size)
                    @if(isset($productSizesValues[$size->id]))
                        <tr>
                            <td style="text-align: center;">
                                {{ $size->name }}
                                <input type="hidden" value="{{ $size->id }}" name="sizes[{{ $i }}][id]">
                            </td>
                            <td style="text-align: center;">
                                <div class="form-group mb-1">
                                    <div class="input-group">
                                        <input type="text" value="{{ isset($productSizesValues[$size->id]) ? $productSizesValues[$size->id]['price'] : 1 }}" name="sizes[{{ $i }}][price]" class="form-control sizeInput" placeholder="" data-validate="price" min="1"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ __('admin.SAR') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div class="form-group mb-1">
                                <input style="text-align: center;" id="kt_touchspin_1" type="text" class="form-control sizeInput" value="{{ isset($productSizesValues[$size->id]) ? $productSizesValues[$size->id]['quantity'] : 1 }}" name="sizes[{{ $i }}][quantity]" placeholder="" data-validate="quantity" min="1" />
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-icon btn-light btn-hover-danger btn-sm btnDelete" type="submit">
                                    <span class="svg-icon svg-icon-md svg-icon-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @endif
                    <?php $i++; ?>
                @endforeach
            @else
                @foreach($productSizes as $size)
                    <tr>
                        <td style="text-align: center;">
                            {{ $size->name }}
                            <input type="hidden" value="{{ $size->id }}" name="sizes[{{ $i }}][id]">
                        </td>
                        <td style="text-align: center;">
                            <div class="form-group mb-1">
                                <div class="input-group">
                                    <input type="text" value="1" name="sizes[{{ $i }}][price]" class="form-control sizeInput" placeholder="" data-validate="price" min="1"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('admin.SAR') }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div class="form-group mb-1">
                            <input style="text-align: center;" id="kt_touchspin_1" type="text" class="form-control sizeInput" value="1" name="sizes[{{ $i }}][quantity]" placeholder="" data-validate="quantity" min="1" />
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <button class="btn btn-icon btn-light btn-hover-danger btn-sm btnDelete" type="submit">
                                <span class="svg-icon svg-icon-md svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>