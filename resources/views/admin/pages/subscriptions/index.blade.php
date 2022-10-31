@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.subscriptions'),
        'menu'      => [
            __('admin.subscriptions') => route('admin.subscriptions'),
        ],
    ])
@endsection

@section('content')
{{-- modale Message --}}
<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin.create_message') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="{{ route('admin.subscriptions.send') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">{{ __('admin.subject') }}</label>
                        <input type="text" class="form-control" id="subject" placeholder="{{ __('admin.subject') }}" name="subject" value="{{ old('subject') }}" required>
                    </div>
                    {{-- discription ar --}}
                    <div class="form-group mb-1">
                        <label for="body">{{ __('admin.body') }}</label>
                        <textarea class="form-control summernote" id="body" placeholder="{{ __('admin.body') }}" rows="4" name="body" required>{{ old('body') }}</textarea>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">{{ __('admin.Close') }}</button>
                    {{-- <button type="button" class="btn btn-primary font-weight-bold">Save changes</button> --}}
                    <button type="submit" class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                    </span> {{ __('admin.send_message') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End modale Message --}}
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.subscriptions') }}</span>
        </h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-primary font-weight-bolder font-size-sm" data-toggle="modal" data-target="#exampleModal">
                {{ __('admin.create_message') }}
            </button>
           
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">

        @include('admin.includes.search', ['hasExport' => true])
        
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        {{-- <th style="text-align: center;">{{ __('admin.Name') }}</th> --}}
                        <th style="text-align: center;">{{ __('admin.admins.Email') }}</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index=>$item)
                        <tr>
                            <td style="text-align: center;">
                                {{ $index+1 }}
                            </td>
                            {{-- <td style="text-align: center;">
                                {{ $item->first_name . ' '. $item->last_name }}
                            </td> --}}
                            <td style="text-align: center;">
                                {{ $item->email }}
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

@section('scripts')
    <script src="{{url('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
@endsection