<section class="container pb-3 mb-1">
    @isset($categories)
        @foreach ($categories as $category)
            @isset($category->products)
                @if (count($category->products) > 0)
                    <div class="row m-2 pb-3">
                        <h2 class="col-md-3 section-title ls-n-15 text-center pb-2 m-b-4">

                            <a href="{{ route('shop', ['category' => $category->slug]) }}">
                                {{ $category->name }}
                            </a>
                        </h2>
                        {{-- <h2 class="col-md-3 section-title ls-n-15 text-center pb-2 m-b-4">{{ t('Featured Products','site') }}</h2> --}}
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <a class="col-md-3 btn " href="{{ route('shop', ['category' => $category->slug]) }}">
                            <i class="icon-circle-arrow-left"> اظهر المزيد... </i>
                            <i class="bi bi-arrow-left-circle-fill"></i>
                        </a>

                    </div>
                    {{-- <div class="owl-carousel cats-slider owl-theme show-nav-hover nav-outer appear-animate"> --}}
                    <div class="row">

                        @foreach ($category->products as $new)
                            @if ($new->getFirstMedia('thumb'))
                                {{-- <div class=" appear-animate" data-animation-name="fadeIn"
                            data-animation-delay="300" data-animation-duration="1000"> --}}
                                <div class="col-md-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="{{ route('product.show', $new->slug) }}">
                                                <img src="{{ $new->getFirstMedia('thumb') ? $new->getFirstMedia('thumb')->getFullUrl() : '' }}"
                                                    width="273" height="273" alt="{{ $new->name }}" />
                                            </a>
                                            <div class="label-group">

                                                @if (!empty($new->special_price))
                                                    <div class="product-label label-sale">
                                                        -
                                                        {{ number_format((($new->price - $new->special_price) / $new->price) * 100, 2) }}%
                                                    </div>
                                                @endif
                                            </div>
                                            @if (!$new->is_pag)
                                            <div class="btn-icon-group">

                                                <button
                                                    class="btn-icon btn-add-cart product-type-simple {{ $new->variants->count() > 0 ? '' : 'simple' }}"
                                                    data-toggle="modal" data-target="#addCartModal"
                                                    data-product-id="{{ $new['id'] }}" title="{{ t('Add To Cart', 'site') }}"
                                                    data-price="{{ $new->special_price ?? $new->price }}"><i
                                                        class="icon-shopping-cart"></i>
                                                </button>

                                            </div>
                                            @endif
                                            <a data-slug="{{ $new->slug }}" href="#" class="btn-quickview"
                                                title="{{ t('Quick View', 'site') }}">{{ t('Quick View', 'site') }}</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">

                                            </div>
                                            <h3 class="product-title">
                                                <a href="{{ route('product.show', $new->slug) }}">{{ $new->name }}</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                @if ($new->special_price && $new->special_price > 0)
                                                    <span class="old-price">{{ $new->price . ' ' . t('SAR', 'site') }}</span>
                                                    <span
                                                        class="product-price">{{ $new->special_price . ' ' . t('SAR', 'site') }}</span>
                                                @else
                                                    <span
                                                        class="product-price">{{ $new->price . ' ' . t('SAR', 'site') }}</span>
                                                @endif
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <hr>
                    {{-- </div> --}}
                @endif
            @endisset
        @endforeach

    @endisset




    <hr class="mt-3 mb-6">

    <div class="row feature-boxes-container pt-2">
        <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInRightShorter"
            data-animation-delay="300" data-animation-duration="1000">
            <div class="feature-box feature-box-simple text-center">
                <i class="sicon-earphones-alt"></i>

                <div class="feature-box-content p-0">
                    <h3 class="text-uppercase">{{ t('Customer Support', 'site') }}</h3>
                    <h5>{{ t('Need Assistence?', 'site') }}</h5>

                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                        et dapibus lacus. Lorem ipsum dolor sit amet.</p> --}}
                </div><!-- End .feature-box-content -->
            </div><!-- End .feature-box -->
        </div><!-- End .col-lg-3 -->

        <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInRightShorter"
            data-animation-delay="100" data-animation-duration="1000">
            <div class="feature-box feature-box-simple text-center">
                <i class="sicon-credit-card"></i>

                <div class="feature-box-content p-0">
                    <h3 class="text-uppercase">{{ t('Secured Payment', 'site') }}</h3>
                    <h5>{{ t('Safe & Fast', 'site') }}</h5>

                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                        et dapibus lacus. Lorem ipsum dolor sit amet.</p> --}}
                </div><!-- End .feature-box-content -->
            </div><!-- End .feature-box -->
        </div><!-- End .col-lg-3 -->
        <!-- End .col-lg-3 -->

        <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="300"
            data-animation-duration="1000">
            <div class="feature-box feature-box-simple text-center">
                <i class="icon-shipping"></i>

                <div class="feature-box-content p-0">
                    <h3 class="text-uppercase">{{ t('Fast Shipping', 'site') }}</h3>
                    {{-- <h5>{{ t('Orders Over','site') }}99{{ t('SAR','site') }}</h5> --}}


                </div>
            </div>
        </div>
    </div><!-- End .row .feature-boxes-container-->
</section>
