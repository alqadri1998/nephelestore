@extends('admin.layouts.app')

@section('page-title') {{__('admin.pages.index')}} @endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.pages.index'),
        'menu'      => [
            __('admin.oages.index') => route('admin.pages.index'),
        ],
    ])
@endsection


@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.pages.index') }}</span>
        </h3>
        <div class="card-toolbar">
            {{-- @if(Auth::user()->can('create-pages'))
                <a href="{{ route('admin.pages.create') }}" class="btn btn-success font-weight-bolder font-size-md">
                {{ __('admin.create') }}</a>
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
                <tr class="fw-bolder text-gray-800 text-center">
                    <th>{{ t('Ar Name') }}</th>
                    <th>{{ t('En Name') }}</th>
                    <th>{{ t('slug') }}</th>
                    {{-- <th>{{ t('Main Category') }}</th> --}}
                    {{-- <th>{{ __('admin.status') }}</th> --}}
                    <th>{{ t('Options') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="text-center">
                    <td>{{ $item->getTranslation('ar')->name }}</td>
                    <td>{{ $item->getTranslation('en')->name }}</td>
                    <td>{{ $item->slug ?? '-' }}</td>
                    
                   
                    <td>                            
                            {{-- 'show'      => route('admin.categories.show', $item->id), --}}
                        <?php 
                            $arr = ['about-us','policy','terms-and-conditions'];
                        ?>
                        @if(in_array($item->slug, $arr))
                            @include('admin.includes.actions', [
                                'edit'      => route('admin.pages.edit', $item->id),
                                'permission'=> 'pages'
                            ])
                        @else
                            @include('admin.includes.actions', [
                                'edit'      => route('admin.pages.edit', $item->id),
                                'destroy'   => route('admin.pages.destroy', $item->id),
                                'permission'=> 'pages'
                            ])
                        @endif
                    </td>
                </tr>
                @endforeach

               
            </tbody>
        </table>
    </div>

    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $items->appends(request()->query())->links() }}
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection