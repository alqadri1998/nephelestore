@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title' => __('admin.admins.index'),
        'menu' => [
            __('admin.admins.index') => route('admin.admins.index'),
        ],
    ])
@endsection

@section('content')
    <div class="card card-custom gutter-b ">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('admin.carts.index') }}</span>
            </h3>
            <div class="card-toolbar">

            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">



            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">{{ __('admin.Name') }}</th>
                            <th style="text-align: center;">{{ __('admin.admins.Email') }}</th>
                            <th style="text-align: center;">{{ __('admin.admins.Mobile') }}</th>
                            <th style="text-align: center;">{{ __('admin.products.index') }}</th>
                            <th style="text-align: center;">{{ t('Status') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $index => $cart)
                            <tr>
                                <td style="text-align: center;">
                                    {{ $cart->user->name }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $cart->user->email }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $cart->user->mobile }}
                                </td>
                                <td style="text-align: center;">

                                    @isset($cart->data)
                                        <a class='btn btn-info' onclick="show_edit_user_modal({{ $cart->id }})">منتجات السله</a>
                                        {{-- @foreach ($cart->data as $item)

                                {{ $item->name }}
                                @endforeach --}}
                                    @endisset

                                </td>
                                </td>
                                <td style="text-align: center;">
                                    {{ $cart->updated_at->diffForHumans() }}

                                </td>

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
        {{ $carts->appends(request()->query())->links() }}
    </div>
    <div class="modal fade" id="kt_modal_edit_customer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div id="edit_form_holder">
                </div>

            </div>
        </div>
    </div>
    <script>
        function show_edit_user_modal(item) {


            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: 'GET',
                url: '{{ route('admin.carts.show','+item+') }}',
                data: {
                    id: item,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    $('#edit_form_holder').html(response);
                    $('#kt_modal_edit_customer').modal('show');

                }
            });

        }
    </script>
@endsection
