@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.reviews.index'),
        'menu'      => [
            __('admin.reviews.index') => route('admin.reviews'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.reviews.index') }}</span>
        </h3>
        <div class="card-toolbar">
           {{--  @if(Auth::user()->can('create-users'))
                <a href="{{ route('admin.users.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
                <span class="svg-icon svg-icon-md svg-icon-white">
                </span>{{ __('admin.create') }}</a>
            @endif --}}
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        @include('admin.includes.search')

        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">{{ t('Name') }}</th>
                        <th style="text-align: center;">{{ t('Product') }}</th>
                        <th style="text-align: center;">{{ t('Comment') }}</th>
                        <th style="text-align: center;">{{ t('Rating') }}</th>
                        <th style="text-align: center;">{{ t('Status') }}</th>
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
                                {{ $item->user->name }}
                            </td>
                            <td style="text-align: center;">
                                @if (isset($item->product->parent))

                               {{$item->product->parent ?$item->product->parent->name:$item->product->name }}
                                @endif
                                {{-- {{ isset($item->product->parent) ?$item->product->parent->name:$item->product->name }} --}}
                            </td>

                            <td style="text-align: center">
                                {{ $item->comment }}
                            </td>

                            <td style="text-align: center">
                                @if($item->rating > 0)
                                    <?php $star = '<i class="flaticon-star" style="color:#ffce00"></i>';
                                        $rating = $item->rating;
                                            for ($i = 1; $i <= $rating; $i++) {
                                                echo $star;
                                            }
                                        ?>
                                     @else
                                        <i class="flaticon-star" style="color:#ffce00"></i>
                                @endif
                            </td>

                            <td style="text-align: center">
                                 {{ $item->status == 0 ? t('Invisible') : t('Visible') }}
                            </td>

                            <td style="text-align: center;width: 160px;">
                               @if($item->status == 0)
                                    <a href="{{ route('admin.reviews_active', $item->id) }}" class="btn btn-sm btn-success">
                                        <i class="flaticon2-checkmark icon-md"></i> {{ t('Make it visible') }}
                                    </a>
                                {{-- @else
                                    <a href="{{ route('admin.reviews_unactive', $item->id) }}"class="btn btn-sm btn-danger"><i class="flaticon-close icon-md"></i> {{ __('admin.notactive') }}</a> --}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $items->appends(request()->query())->links() }}
</div>
@endsection
