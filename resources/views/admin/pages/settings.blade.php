@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title' => __('admin.Settings'),
        'menu' => [
            __('admin.Settings') => route('admin.settings'),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">{{ __('admin.Settings') }}</span>
                    </h3>
                </div>
                <form method="post" action="{{ route('admin.changeSetting') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            {{-- site name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_name_en">{{ t('Website Name') }}</label>
                                    <input type="text" class="form-control" id="site_name_en" name="site_name_en"
                                        value="{{ old('site_name_en') ?? (isset($settings['site_name_en']) ? $settings['site_name_en'] : '') }}">
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="site_name_ar">{{ t('Email') }}</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email') ?? (isset($settings['email']) ? $settings['email'] : '') }}">
                                </div>
                            </div>
                            {{-- mobile --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="site_name_ar">{{ t('mobile') }}</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        value="{{ old('mobile') ?? (isset($settings['mobile']) ? $settings['mobile'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="site_name_ar">{{ t('Location', 'site') }}</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        value="{{ old('location') ?? (isset($settings['location']) ? $settings['location'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- vat --}}
                                <div class="form-group">
                                    <label for="site_name_ar">{{ t('Vat', 'site') }} %</label>
                                    <input type="number" class="form-control" id="vat" name="vat"
                                        value="{{ old('location') ?? (isset($settings['vat']) ? $settings['vat'] : '') }}">
                                </div>
                            </div>

                        </div><!-- /row -->
                        <!--/row-->
                        {{-- Shipping --}}
                        <hr>
                        <h2>الجزء الخاص بالشحن </h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facbook_link">{{ t('Shipping') }} SAMSA</label>
                                    <input type="number" class="form-control" id="samsa" name="samsa"
                                        value="{{ old('samsa') ?? (isset($settings['samsa']) ? $settings['samsa'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">{{ t('Shipping') }} ARAMIX</label>
                                    <input type="number" class="form-control" id="aramix" name="aramix"
                                        value="{{ old('aramix') ?? (isset($settings['aramix']) ? $settings['aramix'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">{{ t('Shipping') }} POSTAGE</label>
                                    <input type="number" class="form-control" id="postage" name="postage"
                                        value="{{ old('postage') ?? (isset($settings['postage']) ? $settings['postage'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">{{ t('Shipping') }} XXXXXXXXX</label>
                                    <div class="form-control">
                                        XXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--/row-->
                        {{-- Social Media Links --}}
                        <hr>
                        <h2>الجزء الخاص بروابط السوشيال ميديا </h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facbook_link">{{ t('Facbook Link') }}</label>
                                    <input type="text" class="form-control" id="facbook_link" name="facbook_link"
                                        value="{{ old('facbook_link') ?? (isset($settings['facbook_link']) ? $settings['facbook_link'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">{{ t('Twitter Link') }}</label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                        value="{{ old('twitter_link') ?? (isset($settings['twitter_link']) ? $settings['twitter_link'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram_link">{{ t('Instagram Link') }}</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link"
                                        value="{{ old('instagram_link') ?? (isset($settings['instagram_link']) ? $settings['instagram_link'] : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="maroof_link">{{ t('Maroof Link', 'site') }}</label>
                                    <input type="text" class="form-control" id="maroof_link" name="maroof_link"
                                        value="{{ old('maroof_link') ?? (isset($settings['maroof_link']) ? $settings['maroof_link'] : '') }}">
                                </div>
                            </div>

                        </div>

                        {{-- SEO --}}
                        <hr>
                        <h2>الجزء الخاص بمحركات البحث</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="site_description_ar">{{ t('Site Description Ar') }}</label>
                                <textarea name="site_description_ar" class="form-control" rows="8">{{ old('site_description_ar') ?? (isset($settings['site_description_ar']) ? $settings['site_description_ar'] : '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="site_description_en">{{ t('Site Description En') }}</label>
                                <textarea name="site_description_en" class="form-control" rows="8">{{ old('site_description_en') ?? (isset($settings['site_description_en']) ? $settings['site_description_en'] : '') }}</textarea>
                            </div>
                        </div>
                        <!--/row-->


                        {{-- site_description_ar site_description_en --}}

                        {{-- site_key_words --}}
                        <div class="form-group">
                            <label for="kt_tagify_1">{{ t('Key Words') }}</label>
                            <input id="kt_tagify_1" class="form-control tagify" name='site_key_words'
                                value="{{ old('site_key_words') ?? (isset($settings['site_key_words']) ? $settings['site_key_words'] : '') }}" />
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputAddress">كود خريطة جزء تواصل معنا (Iframe)</label>
                                    <textarea dir="ltr" name="contact_us_map_html" class="form-control" id="" cols="30"
                                        rows="10">{{ $settings['contact_us_map_html'] }}</textarea>
                                </div>
                                @if (!empty($settings['contact_us_map_html']))
                                    <div class="form-group">
                                        <label for="inputAddress" style="width:100%; display: block">شكل الخريطة</label>
                                        {!! $settings['contact_us_map_html'] !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- logo --}}
                        <div class="input-group mb-3 half-width">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ t('Logo') }}</span>
                            </div>
                            <div class="custom-file">
                                <input id="imgInp" type="file" name="logo" class="custom-file-input"
                                    accept="image/x-png,image/gif,image/jpeg" id="imgInp" />
                                <label class="custom-file-label"
                                    for="inputGroupFile01">{{ __('auth.Choose file') }}</label>
                            </div>
                        </div>
                        @if (isset($settings) && $settings['logo'])
                            <div class="text-center">
                                <img class="img-thumbnail" style="width: 400px;margin-bottom: 20px;"
                                    src="{{ url($settings['logo']) }}" alt="admin"width="120" id="blah">
                            </div>
                        @else
                            <div class="text-center">
                                <img class="img-thumbnail" style="width: 400px;margin-bottom: 20px;display: none"
                                    src="" alt="admin" width="120" id="blah">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('assets/admin/js/pages/crud/forms/widgets/tagify.js') }}"></script>
    <script>
        function readURLInp(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').css('display', 'block');
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $("#imgInp").change(function() {
                readURLInp(this);
            });
        });
    </script>
@endsection
