@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.roles.index'),
        'menu'      => [
            __('admin.roles.index') => route('admin.roles.index'),
        ],
    ])
@endsection

@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.roles.index') }}</span>
        </h3>
        <div class="card-toolbar">
            @if(Auth::user()->can('create-roles'))
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success font-weight-bolder font-size-md">
                {{ __('admin.roles.create') }}</a>
            @endif
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        {{-- @include('admin.includes.search') --}}
        
        <!--begin::Table-->

        @include('admin.includes.table', [
            'headers'       => [__('admin.Name'), __('admin.roles.description')],
            'withOptions' => true,
            'items'           => $roles,
            'fields'           => ['name', 'description'],
            'model'          => 'roles'
        ])

    </div>
    <!--end::Body-->
</div>
<div class="admin-pagination">
    {{ $roles->appends(request()->query())->links() }}
</div>
@endsection