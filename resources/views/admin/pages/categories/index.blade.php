@extends('admin.layouts.app')

@section('page-title') {{__('admin.categories.index')}} @endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.categories.index'),
        'menu'      => [
            __('admin.categories.index') => route('admin.categories.index'),
        ],
    ])
@endsection


@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.categories.index') }}</span>
        </h3>
        <div class="card-toolbar">
            @if(Auth::user()->can('create-categories'))
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success font-weight-bolder font-size-md">
                {{ __('admin.create') }}</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        
        @include('admin.includes.search')
        
        <!--begin::Table-->

       {{--  @include('admin.includes.table', [
            'headers'       => [__('admin.ar_name'),__('admin.en_name'), __('admin.flow_category') , __('admin.status')],
            'withOptions' => true,
            'items'           => $items,
            'fields'           => ['ar.name', 'status'],
            'model'          => 'categories'
        ]) --}}
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
            <thead>
                <tr class="fw-bolder text-gray-800 text-center">
                    <th>{{ '#' }}</th>
                    <th>{{ t('Image') }}</th>
                    <th>{{ __('admin.ar_name') }}</th>
                    <th>{{ __('admin.en_name') }}</th>
                    <th>{{ t('Main Category') }}</th>
                    <th>عدد المنتجات</th>
                    <th>{{ __('admin.status') }}</th>
                    <th>{{ t('Options') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index=>$item)
                <tr class="text-center">
                    <td>{{ $index+1 }}</td>
                    <td>
                        <img src="{{ $item->getFirstMedia('thumb') ? $item->getFirstMedia('thumb')->getFullUrl():'' }}" width="100">
                    </td>
                    <td>{{ $item->getTranslation('ar')->name }}</td>
                    <td>{{ $item->getTranslation('en')->name }}</td>
                    <td>{{ $item->parent? $item->parent->name : '-' }}</td>
                    <td>{{ $item->products()->whereNull('parent_id')->count()}}</td>
                    <td>{{ $item->active ? __('admin.active') :  __('admin.deactive') }}</td>
                   
                    <td>                            
                        @include('admin.includes.actions', [
                            'show'      => route('admin.categories.show', $item->id),
                            'edit'      => route('admin.categories.edit', $item->id),
                            'destroy'   => route('admin.categories.destroy', $item->id),
                            'permission'=> 'categories'
                        ])
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