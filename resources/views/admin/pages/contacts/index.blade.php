@extends('admin.layouts.app')

@section('page-title') {{__('admin.contacts.index')}} @endsection
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
            <form method="post" action="{{ route('admin.contact.send') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="send">{{ t('Send To') }}</label>
                        <input type="text" class="form-control" id="send" name="subject" readonly>
                    </div>
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
@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.contacts.index'),
        'menu'      => [
            __('admin.contacts.index') => route('admin.contacts.index'),
        ],
    ])
@endsection


@section('content')
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.contacts.index') }}</span>
        </h3>
        <div class="card-toolbar">
            
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        
        @include('admin.includes.search')
        
       
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
            <thead>
                <tr class="fw-bolder text-gray-800 text-center">
                    <th>{{ t('Name', 'site') }}</th>
                    <th>{{ t('Email', 'site') }}</th>
                    {{-- <th>{{ t('Mobile', 'site') }}</th> --}}
                    <th>{{ t('Subject', 'site') }}</th>
                    <th>{{ t('Comments', 'site') }}</th>
                    <th>{{ t('Answered', 'site') }}</th>
                    <th>{{ t('Options') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr class="text-center">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>{{ $item->mobile }}</td> --}}
                    <td>{{ $item->subject}}</td>
                    <td>{{ $item->message}}</td>
                    <td>{{ $item->replay ? t('Yes') : t('No')}}</td>
                    <td>
                        <button type="button" class="btn btn-primary font-weight-bolder font-size-sm send-reply" data-toggle="modal" data-id="{{ $item->id }}" data-email="{{ $item->email }}" data-target="#exampleModal">
                {{ __('admin.create_message') }}
            </button>
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
$('.send-reply').on('click', function() {
    $('#id').val($(this).data('id'));
    $('#send').val($(this).data('email'));

});
</script>
@endsection