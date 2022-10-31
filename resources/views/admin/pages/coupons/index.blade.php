@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.coupons.index'),
        'menu'      => [
            __('admin.coupons.index') => route('admin.coupons.index'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.coupons.index') }}</span>
        </h3>
        <div class="card-toolbar">
            @if(Auth::user()->can('create-coupons'))
                <a href="{{ route('admin.coupons.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
                <span class="svg-icon svg-icon-md svg-icon-white">
                </span>{{ __('admin.create') }}</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        
        @include('admin.includes.search')
        
        <!--begin::Table-->
            @if($items->count() > 0)
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">{{ t('Coupon') }}</th>
                            <th style="text-align: center;">{{ t('Value') }}</th>
                            <th style="text-align: center;">{{ t('Maximum discount') }}</th>
                            <th style="text-align: center;">{{ t('Categories') }}</th>
                            <th style="text-align: center;">{{ t('Products') }}</th>
                            <th style="text-align: center;">{{ t('Status') }}</th>
                            <th style="text-align: center;">{{ t('Used Counts') }}</th>
                            <th style="text-align: center;">{{ __('admin.Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($items as $index=>$item)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $index+1 }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $item->coupon }}
                                </td>
                                <td style="text-align: center;">
                                    {{$item->value}} {{ $item->type == 'percentage' ? '%': t('SAR') }}
                                </td>
                                <td style="text-align: center;">
                                    {{$item->maximum_discount > 0 ? $item->maximum_discount . ' '.t('SAR') : '-'}}
                                </td>
                                
                                <td style="text-align: center;vertical-align: middle;">
                                   @if($item->categories()->count() > 0)
                                        @foreach($item->categories as $category)
                                        <p>{{ $category->name }}</p>
                                        @endforeach
                                   @else
                                   -
                                   @endif
                                </td>

                                 <td style="text-align: center;vertical-align: middle;">
                                    @if($item->products()->count() > 0)
                                        @foreach($item->products as $product)
                                        <p>{{ $product->name }}</p>
                                        @endforeach
                                   @else
                                   -
                                   @endif
                                </td>
                                 <td style="text-align: center;vertical-align: middle;">
                                   {{ $item->active ?'نشط': 'غير نشط' }}
                                </td>
                                 <td style="text-align: center;">
                                    {{-- {{ $item->orders->count() }} --}}
                                    0
                                </td>
                                <td style="text-align: center;">
                                        {{-- 'show'      => route('admin.coupons.show', $item->id), --}}
                                    @include('admin.includes.actions', [
                                        'edit'      => route('admin.coupons.edit', $item->id),
                                        'destroy'   => route('admin.coupons.destroy', $item->id),
                                        'permission'=> 'coupons'
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h2 class="text-center">{{ __('admin.No Data') }}</h2>
            @endif
        
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $items->appends(request()->query())->links() }}
</div>
@endsection