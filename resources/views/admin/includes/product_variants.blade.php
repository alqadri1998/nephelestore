<div class="table-responsive">
    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
        <thead>
            <tr>
                {{-- <th style="text-align: center;">{{ __('admin.Size') }}</th> --}}
                <th style="text-align: center;">{{ __('admin.Color') }}</th>
                <th style="text-align: center;">{{ __('admin.Stock') }}</th>
                <th style="text-align: center;">{{ __('admin.Price') }}</th>
                <th style="text-align: center;">{{ t('Special Price') }}</th>
                <th style="text-align: center;">{{ __('admin.weight_by_kg') }}</th>
                {{-- <th style="text-align: center;"></th> --}}
                {{-- <th style="text-align: center;">{{ __('admin.Discount Percentage') }}</th> --}}
                {{-- <th style="text-align: center;">{{ __('admin.Img') }}</th> --}}
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;?>
            @if($product)
                @foreach($product->getVariants() as $variant)
                    <tr class="variant-tr">
                    <input type="hidden" name="variants[id][{{$i}}]" value="{{ $variant['id'] }}">
                        {{-- <td style="text-align: center;width: 15%;"> --}}
                            {{-- <select class="form-control" name="variants[size][{{$i}}]">
                                <option value="">{{ __('admin.select') }}</option>
                                @foreach($productSizes as $size)
                                    <option value="{{ $size->id }}" {{ $variant['size_id'] == $size->id ? 'selected' : '' }}>{{ $size->size }}</option>
                                @endforeach
                            </select> --}}
                        {{-- </td> --}}
                        <td style="text-align: center;width: 15%;">
                            <select class="form-control color-variant" name="variants[color][{{$i}}]">
                                <option value="">{{ __('admin.select') }}</option>
                                @foreach($productColors as $color)
                                    <option value="{{ $color->id }}" {{ $variant['color_id'] == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style="text-align: center;width: 15%;"><input type="number" value="{{ $variant['stock'] }}" class="form-control" name="variants[stock][{{$i}}]"></td>
                        <td style="text-align: center;width: 15%;"><input type="number" step="any" value="{{ $variant['price'] }}" class="form-control" name="variants[price][{{$i}}]"></td>
                        <td style="text-align: center;width: 15%;"><input type="number" step="any" value="{{ $variant['special_price'] }}" class="form-control" name="variants[special_price][{{$i}}]"></td>
                        <td style="text-align: center;width: 15%;"><input type="number" step="any" value="{{ $variant['weight']??'' }}" class="form-control" name="variants[weight][{{$i}}]" required></td>



                        <td style="text-align: center;width: 2%;">
                            <button class="btn btn-danger btnDelete">{{__('admin.Delete')}}</button>
                        </td>
                    </tr>
                    <?php $i++;?>
                @endforeach
            @endif
            <tr class="variant-tr">
                {{-- <td style="text-align: center;width: 15%;">
                    <select class="form-control" name="variants[size][]">
                        <option value="">{{ __('admin.select') }}</option>
                        @foreach($productSizes as $size)
                            <option value="{{ $size->id }}" >{{ $size->size }}</option>
                        @endforeach
                    </select>
                </td> --}}
                <td style="text-align: center;width: 15%;">
                    <select class="form-control color-variant" name="variants[color][]">
                        <option value="">{{ __('admin.select') }}</option>
                        @foreach($productColors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td style="text-align: center;width: 15%;"><input type="number" value="" class="form-control" name="variants[stock][]"></td>
                <td style="text-align: center;width: 15%;"><input type="number" value="" class="form-control" name="variants[price][]"></td>
                <td style="text-align: center;width: 15%;"><input type="number" value="" class="form-control" name="variants[special_price][{{$i}}]"></td>
                <td style="text-align: center;width: 15%;"><input type="number" step="any" class="form-control" name="variants[weight][{{$i}}]" required></td>
                {{-- <td style="text-align: center;width: 15%;"><input type="text" value="" class="form-control" name="variants[discount_percent][]"></td> --}}
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


</div>