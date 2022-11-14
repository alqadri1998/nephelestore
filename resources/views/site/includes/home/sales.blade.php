<section class="container pb-3 mb-1">
    <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">{{ t('Featured Products','site') }}</h2>
    <div class="owl-carousel cats-slider owl-theme show-nav-hover nav-outer appear-animate">
        @foreach($sales as $sale)
        @if($sale->getFirstMedia('thumb'))
        <div class=" appear-animate" data-animation-name="fadeIn"
            data-animation-delay="300" data-animation-duration="1000">
            <div class="product-default inner-quickview inner-icon">
                <figure>
                    <a href="{{ route('product.show', $sale->slug) }}">
                        <img src="{{ $sale->getFirstMedia('thumb')? $sale->getFirstMedia('thumb')->getFullUrl():'' }}" width="273"
                            height="273" alt="{{ $sale->name }}" />
                    </a>
                    <div class="label-group">
                        {{-- @if($sale->new)
                        <div class="product-label label-hot">{{ t('New') }}</div>
                        @endif --}}
                        @if(!empty($sale->special_price))
                            <div class="product-label label-sale">
                            - {{ number_format((($sale->price - $sale->special_price) / $sale->price) * 100, 2)}}%
                        </div>
                        @endif
                    </div>
                    <div class="btn-icon-group">
                        <button class="btn-icon btn-add-cart product-type-simple {{ $sale->variants->count() > 0 ? '':'simple' }}" data-toggle="modal" data-target="#addCartModal" data-product-id="{{ $sale['id'] }}" title="{{ t('Add To Cart','site') }}" data-price="{{ $sale->special_price ?? $sale->price }}"><i class="icon-shopping-cart"></i></button>
                        {{-- <a href="#" class="btn-icon btn-add-cart product-type-simple">
                            <i class="icon-shopping-cart"></i>
                        </a> --}}
                    </div>
                    <a data-slug="{{ $sale->slug }}" href="#" class="btn-quickview"
                        title="{{ t('Quick View','site') }}">{{ t('Quick View','site') }}</a>
                </figure>
                <div class="product-details">
                    <div class="category-wrap">
                        {{-- <div class="category-list">
                            <a href="{{ url('/shop/products?category='.$sale->category->slug) }}" class="product-category">{{ $sale->category?$sale->category->name:'' }}</a>
                        </div> --}}
                    </div>
                    <h3 class="product-title">
                        <a href="{{ route('product.show', $sale->slug) }}">{{ $sale->name }}</a>
                    </h3>
                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div><!-- End .product-ratings -->
                    </div><!-- End .product-container -->
                    <div class="price-box">
                        @if($sale->special_price && $sale->special_price > 0)
                            <span class="old-price">{{ $sale->price .' '. t('SAR', 'site') }}</span>
                            <span class="product-price">{{ $sale->special_price .' '. t('SAR','site') }}</span>
                        @else
                            <span class="product-price">{{ $sale->price .' '. t('SAR','site') }}</span>
                        @endif
                    </div><!-- End .price-box -->
                </div><!-- End .product-details -->
            </div>
        </div>
        @endif
        @endforeach

    </div>

    <hr class="mt-3 mb-6">
</section>
