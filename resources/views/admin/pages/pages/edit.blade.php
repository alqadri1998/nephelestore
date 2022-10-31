@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.edit'),
        'menu'      => [
            __('admin.pages.index') => route('admin.pages.index'),
            __('admin.edit') => route('admin.pages.edit', $item->id),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.edit') }}</h3>
                </div>
                @include('admin.pages.pages.form', ['item'  => $item])
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{url('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
<script>
 
</script>
@endsection