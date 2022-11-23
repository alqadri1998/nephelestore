<?php
$wishList = Auth::check()
    ? Auth::user()
        ->wishlist()
        ->pluck('products.id')
        ->toArray()
    : [];
?>
@extends('site.layouts.app')
@section('title')
    | {{ $product->name }}
@endsection
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home', 'site') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">


            <div class="row products">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="label-group">
                            {{-- @if ($product->new) --}}
                            {{--     <div class="product-label label-hot">{{ t('New') }}</div>
                        @endif --}}
                            {{-- <div class="product-label label-hot">HOT</div> --}}
                            @if (!empty($product->special_price))
                                <div class="product-label label-sale">
                                    -
                                    {{ number_format((($product->price - $product->special_price) / $product->price) * 100, 2) }}%
                                </div>
                            @endif

                        </div>
                        @if ($product->getMedia('images'))
                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @foreach ($product->getMedia('images') as $img)
                                    @if ($img->getFullUrl())
                                        <div class="product-item active">
                                            <img class="product-single-image" src="{{ $img->getFullUrl() }}"
                                                data-zoom-image="{{ $img->getFullUrl() }}" width="468" height="468"
                                                alt="{{ $product->name }}" />
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                        @endif
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                        @foreach ($product->getMedia('images') as $img)
                            @if ($img->getFullUrl())
                                <div class="owl-dot">
                                    <img src="{{ $img->getFullUrl() }}" width="110" height="110"
                                        alt="product-thumbnail" />
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div><!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    <div class="row">
                        <div class="col-md-10">
                            <h1 class="product-title">{{ $product->name }}</h1>
                        </div>
                        @if (!$product->is_pag)
                            <div class="col-md-2">
                                <a href="#"
                                    class="btn-icon-wish addToWishlist {{ in_array($product->id, $wishList) ? 'added-wishlist' : '' }}"
                                    data-product-id="{{ $product->id }}"
                                    title="{{ in_array($product->id, $wishList) ? t('Remove from Wishlist', 'site') : t('Add to Wishlist', 'site') }}"><i
                                        class="icon-heart" style="font-size: 22px;"></i></a>
                            </div>
                        @endif
                    </div>


                    <div class="product-nav">

                    </div>

                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div><!-- End .product-ratings -->

                        <a href="#" class="rating-link">( 5 )</a>
                    </div><!-- End .ratings-container -->

                    <hr class="short-divider">

                    <div class="price-box">
                        @if ($product->special_price && $product->special_price > 0)
                            <span class="old-price">{{ $product->price . ' ' . t('SAR', 'site') }}</span>
                            <span class="new-price">{{ $product->special_price . ' ' . t('SAR', 'site') }}</span>
                        @else
                            <span class="new-price">{{ $product->price . ' ' . t('SAR', 'site') }}</span>
                        @endif
                        {{-- <span class="old-price">$1,999.00</span> --}}
                        {{-- <span class="new-price">$1,699.00</span> --}}
                    </div><!-- End .price-box -->

                    <div class="product-desc">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div><!-- End .product-desc -->
                    <hr class="divider mb-0 mt-0">
                    @if (count($product->variants) > 0)
                        <h3>{{ t('Colors', 'site') }}</h3>
                        <ul class="single-info-list product-variants-list">

                            @foreach ($product->variants as $variant)
                                <li class="product-variants" data-id="{{ $variant->id }}"
                                    style="background-color:{{ $variant->color->color }} !important;color: #fff;">
                                    {{ $variant->color->name }}
                                </li>
                            @endforeach



                            {{-- <li>
                    {{ t('Category') }}: <strong><a href="#" class="product-category">{{ $product->category->name }}</a></strong>
                </li> --}}


                        </ul>
                    @endif
                    @if (!$product->is_pag)
                        <div class="product-action">
                            <div class="product-single-qty">
                                {{-- <input class="horizontal-quantity form-control" type="text"> --}}
                            </div><!-- End .product-single-qty -->

                            <a href="javascript:;" class="btn-add-cart btn btn-dark add-cart mr-2" data-toggle="modal"
                                data-target="#addCartModal" data-product-id="{{ $product->id }}" data-variant=""
                                id="add-cart" data-image="{{ $product->getFirstMedia('thumb')->getFullUrl() }}"
                                data-title="{{ $product->name }}"
                                title="{{ t('Add To Cart', 'site') }}">{{ t('Add To Cart', 'site') }}</a>

                            {{-- <a href="cart.html" class="btn btn-gray view-cart d-none">{{ t('View cart','site') }}</a> --}}
                        </div><!-- End .product-action -->
                    @endif
                    <hr class="divider mb-0 mt-0">

                    <!-- End .product single-share -->
                </div><!-- End .product-single-details -->
            </div><!-- End .row -->
        </div><!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                        role="tab" aria-controls="product-desc-content"
                        aria-selected="true">{{ t('Description', 'site') }}</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                        role="tab" aria-controls="product-reviews-content"
                        aria-selected="false">{{ t('Reviews', 'site') }}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                    aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        {!! $product->description !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                    aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        @if (count($product->reviews) > 0)
                            <h3 class="reviews-title">{{ t('Review for', 'site') }} {{ $product->name }}</h3>

                            <div class="comment-list" style="width: 77%;">
                                @foreach ($product->reviews()->where('status', 1)->get() as $review)
                                    <div class="comments">
                                        <figure class="img-thumbnail">
                                            <img src="{{ url('assets/site/images/author.jpg') }}" alt="author"
                                                width="80" height="80">
                                        </figure>

                                        <div class="comment-block">
                                            <div class="comment-header">
                                                <div class="comment-arrow"></div>

                                                <div class="ratings-container float-sm-right">
                                                    <div class="product-ratings">
                                                        <span class="ratings"
                                                            style="width:{{ $review->rating * 2 * 10 }}%"></span>

                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>

                                                <span class="comment-by">
                                                    <strong>{{ $review->user->name }}</strong> – {{ $review->created_at }}
                                                </span>
                                            </div>

                                            <div class="comment-content">
                                                <p>{{ $review->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="divider"></div>
                        @endif


                        <div class="add-product-review" style="width: 70%;">
                            <h3 class="review-title">{{ t('Add a review', 'site') }}</h3>
                            @if (Auth::check())
                                <form action="{{ route('addReview', $product->id) }}" method="post"
                                    class="comment-form m-0">
                                    {{ csrf_field() }}
                                    <div class="rating-form">
                                        <label for="rating">{{ t('Your rating', 'site') }} <span
                                                class="required">*</span></label>
                                        <span class="rating-stars">
                                            <a class="star-1" href="#">1</a>
                                            <a class="star-2" href="#">2</a>
                                            <a class="star-3" href="#">3</a>
                                            <a class="star-4" href="#">4</a>
                                            <a class="star-5" href="#">5</a>
                                        </span>

                                        <select name="rating" id="rating" required="" style="display: none;">
                                            <option value="">Rate…</option>
                                            <option value="5">Perfect</option>
                                            <option value="4">Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Not that bad</option>
                                            <option value="1">Very poor</option>
                                        </select>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="form-group">
                                        <label>{{ t('Your comment', 'site') }} <span class="required">*</span></label>
                                        <textarea cols="5" name="comment" rows="6" class="form-control form-control-sm" required></textarea>
                                    </div><!-- End .form-group -->



                                    <input type="submit" class="btn btn-primary" value="{{ t('Submit', 'site') }}">
                                </form>
                            @else
                                <p>{{ t('Login to be able to add a comment', 'site') }}</p>
                                <br>
                                <a href="{{ route('login') }}" class="btn btn-primary"> {{ t('Login', 'site') }}</a>
                            @endif
                        </div>
                        {{-- End .add-product-review --}}
                    </div><!-- End .product-reviews-content -->
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-single-tabs -->


        <!-- End .products-section -->

        <hr class="mt-0 m-b-5" />

        <div class="product-widgets-container row pb-2">

        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
    <section class="container pb-3 mb-1">
        @if ($status == 'related')
            <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">{{ t('Related Products', 'site') }}</h2>
            <div class="owl-carousel cats-slider owl-theme show-nav-hover nav-outer appear-animate">
                @foreach ($related as $new)
                    @if ($new->getFirstMedia('thumb'))
                        <div class="appear-animate" data-animation-name="fadeIn" data-animation-delay="300"
                            data-animation-duration="1000">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{ route('product.show', $new->slug) }}">
                                        <img src="{{ $new->getFirstMedia('thumb') ? $new->getFirstMedia('thumb')->getFullUrl() : '' }}"
                                            width="273" height="273" alt="{{ $new->name }}" />
                                    </a>
                                    <div class="label-group">
                                        {{-- @if ($new->new)
                            <div class="product-label label-hot">{{ t('New') }}</div>
                            @endif --}}
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
                                                class="btn-icon btn-add-cart product-type-simple
                            {{ $new->variants->count() > 0 ? '' : 'simple' }}"
                                                data-toggle="modal" data-target="#addCartModal"
                                                data-product-id="{{ $new['id'] }}"
                                                title="{{ t('Add To Cart', 'site') }}"
                                                data-price="{{ $new->special_price ?? $new->price }}"><i
                                                    class="icon-shopping-cart"></i>
                                            </button>
                                            {{-- <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                            </a> --}}
                                        </div>
                                    @endif
                                    <a data-slug="{{ $new->slug }}" href="#" class="btn-quickview"
                                        title="{{ t('Quick View', 'site') }}">{{ t('Quick View', 'site') }}</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        {{-- <div class="category-list">
                                <a href="{{ url('/shop/products?category='.$new->category->slug) }}" class="product-category">{{ $new->category?$new->category->name:'' }}</a>
                            </div> --}}
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
                                            <span class="product-price">{{ $new->price . ' ' . t('SAR', 'site') }}</span>
                                        @endif
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        @else
            <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">{{ t('Package Products', 'site') }}</h2>
            <div class="row">
                @foreach ($related as $new)
                    @if ($new->getFirstMedia('thumb') || $status != 'related')
                        <div class="product-default col-md-2">
                            <figure>
                                <a href="{{ route('product.show', $new->slug) }}">
                                    <img src="{{ $new->getFirstMedia('thumb') ? $new->getFirstMedia('thumb')->getFullUrl() : '' }}"
                                        width="273" height="273" alt="{{ $new->name }}" />
                                </a>
                                <div class="label-group">
                                    {{-- @if ($new->new)
                            <div class="product-label label-hot">{{ t('New') }}</div>
                            @endif --}}
                                    @if (!empty($new->special_price))
                                        <div class="product-label label-sale">
                                            -
                                            {{ number_format((($new->price - $new->special_price) / $new->price) * 100, 2) }}%
                                        </div>
                                    @endif
                                </div>
                                <div class="btn-icon-group">
                                    <button
                                        class="btn-icon btn-add-cart product-type-simple {{ $new->variants->count() > 0 ? '' : 'simple' }}"
                                        data-toggle="modal" data-target="#addCartModal"
                                        data-product-id="{{ $new['id'] }}" title="{{ t('Add To Cart', 'site') }}"
                                        data-price="{{ $new->special_price ?? $new->price }}"><i
                                            class="icon-shopping-cart"></i></button>
                                    {{-- <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                            </a> --}}
                                </div>
                                <a data-slug="{{ $new->slug }}" href="#" class="btn-quickview"
                                    title="{{ t('Quick View', 'site') }}">{{ t('Quick View', 'site') }}</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    {{-- <div class="category-list">
                                <a href="{{ url('/shop/products?category='.$new->category->slug) }}" class="product-category">{{ $new->category?$new->category->name:'' }}</a>
                            </div> --}}
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
                                        <span class="product-price">{{ $new->special_price . ' ' . t('SAR', 'site') }}</span>
                                    @else
                                        <span class="product-price">{{ $new->price . ' ' . t('SAR', 'site') }}</span>
                                    @endif
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    @endif
                @endforeach

            </div>
        @endif


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

            <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInLeftShorter"
                data-animation-delay="300" data-animation-duration="1000">
                <div class="feature-box feature-box-simple text-center">
                    <i class="icon-shipping"></i>

                    <div class="feature-box-content p-0">
                        <h3 class="text-uppercase">{{ t('Free Shipping', 'site') }}</h3>
                        <h5>{{ t('Orders Over', 'site') }}99{{ t('SAR', 'site') }}</h5>


                    </div>
                </div>
            </div>
        </div><!-- End .row .feature-boxes-container-->
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.product-variants').on('click', function() {
                $(this).addClass('active').siblings().removeClass('active');
                $('#add-cart').attr('data-variant', $(this).data('id'));
            });

        })
    </script>
@endsection
