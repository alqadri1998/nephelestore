@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.create'),
        'menu'      => [
            __('admin.coupons.index') => route('admin.coupons.index'),
            __('admin.create') => route('admin.coupons.create'),
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
                @include('admin.pages.coupons.form')
            </div>
        </div>
    </div>
@endsection

