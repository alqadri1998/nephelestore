@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title' => __('admin.edit'),
        'menu' => [
            __('admin.users.index') => route('admin.users.index'),
            __('admin.create') => route('admin.users.create'),
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
                @include('admin.pages.users.form')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.create') }}</h3>
                </div>
                <div class="card-body">
                <form method="post"
                    action="{{ isset($item) ? route('admin.users.update', $item) : route('admin.users.store') }}"
                    enctype="multipart/form-data">
                    <div class="row">
                    <div class="form-group">
                        <label class="col-form-label">{{ t('Excel') }}</label>
                        <div class="">
                            <input type="file" name="excel" id="excel" onchange="this.form.submit()"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />

                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
@endsection
