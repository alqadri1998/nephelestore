<?php
$wishList = Auth::check() ? Auth::user()->wishlist()->pluck('products.id')->toArray() : [];
?>
@extends('site.layouts.app')
@section('title')
| {{ t('Shop' , 'site') }}
@endsection
@section('content')
<div class="category-banner-container bg-gray">
    <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url({{ isset($currentCategory) && !empty($currentCategory) && $currentCategory->image ? url($currentCategory->image):  url('assets/site/images/banners/banner-top.jpg') }});min-height: 300px;">

    </div>
</div>

<div class="container">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">
            	{{-- <i class="icon-home"></i> --}}
            	{{ t('Home','site') }}
            </a></li>

            @if(isset($currentCategory) && !empty($currentCategory))
            <li class="breadcrumb-item active" aria-current="page">{{ $currentCategory->name }}</li>
            @else
            <li class="breadcrumb-item" ><a href="{{ route('shop') }}">{{ t('Shop','site') }}</a></li>
            @endif
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-9 main-content">
            <div class="row">

            	@foreach($items as $item)
                @if($item->getFirstMedia('thumb'))
                <div class="col-6 col-sm-3">
                    <div class="product-default">
                        <figure>
                            <a href="{{ route('product.show',$item->slug) }}">
                                <img src="{{ $item->getFirstMedia('thumb') ? $item->getFirstMedia('thumb')->getFullUrl():'' }}" width="280" height="280" alt="product" />
                                {{-- <img src="{{ $item->getFirstMedia('thumb') ? $item->getFirstMedia('thumb')->getFullUrl():'' }}" width="280" height="280" alt="product" /> --}}
                            </a>

                            <div class="label-group">
                                {{-- @if($item->new)
                                <div class="product-label label-hot">{{ t('New') }}</div>
                                @endif --}}
                                @if(!empty($item->special_price))
                                    <div class="product-label label-sale">
                                    - {{ number_format((($item->price - $item->special_price) / $item->price) * 100, 2)}}%
                                </div>
                                @endif
                            </div>
                            {{-- <div class="btn-icon-group"> --}}


                            {{-- </div> --}}
                        </figure>

                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="{{ url('/shop/products?category='.$item->category->slug) }}" class="product-category">
                                        {{ $item->category->name }}
                                    </a>
                                </div>
                            </div>

                            <h3 class="product-title">
                                <a href="{{ route('product.show', $item->slug) }}">{{ $item->name }}
                                </a>
                             </h3>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->

                            <div class="price-box">
                                @if($item->special_price && $item->special_price > 0)
                                <span class="old-price">{{ $item->price .' '. t('SAR', 'site') }}</span>
                                <span class="product-price">{{ $item->special_price .' '. t('SAR','site') }}</span>
                            @else
                                <span class="product-price">{{ $item->price .' '. t('SAR','site') }}</span>
                            @endif

                            </div>
                            <!-- End .price-box -->

                            <div class="product-action">
                                <a href="#" class="btn-icon-wish addToWishlist {{ in_array($item->id,$wishList) ? 'added-wishlist':'' }}"
                                data-product-id="{{ $item->id }}"
                                title="{{ in_array($item->id,$wishList) ? t('Remove from Wishlist', 'site'):t('Add to Wishlist', 'site') }}"><i
										class="icon-heart"></i></a>
                                <button class="btn-icon btn-add-cart product-type-simple {{ $item->variants->count() > 0 ? '':'simple' }}" data-toggle="modal" data-image="{{ $item->getFirstMedia('thumb') ?$item->getFirstMedia('thumb')->getFullUrl() :'' }}" data-target="#addCartModal" data-product-id="{{ $item->id }}" title="{{ t('Add To Cart','site') }}" data-price="{{ $item->special_price ?? $item->price }}"><i class="icon-shopping-cart"></i> {{ t('Add To Cart','site') }}</button>
                                <a data-slug="{{ $item->slug }}" href="#" class="btn-quickview" title="{{ t('Quick View','site') }}"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            <!-- End .row -->

            <nav class="toolbox toolbox-pagination">
                {{-- <div class="toolbox-item toolbox-show">
                    <label>Show:</label>

                    <div class="select-custom">
                        <select name="count" class="form-control">
							<option value="12">12</option>
							<option value="24">24</option>
							<option value="36">36</option>
						</select>
                    </div>
                </div> --}}
                    <!-- End .select-custom -->
                <!-- End .toolbox-item -->

                {{-- <ul class="pagination toolbox-item">
                    <li class="page-item disabled">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><span class="page-link">...</span></li>
                    <li class="page-item">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                    </li>
                </ul> --}}
                {{ $items->appends(request()->query())->links() }}
            </nav>
        </div>
        <!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">{{ t('Categories','site') }}</a>
                    </h3>

                    <div class="collapse show" id="widget-body-2">
                        <div class="widget-body">
                            <ul class="cat-list">
                                @foreach($categories as $category)
                                @if($category->children->count() > 0)
                                    <li>
                                        <a href="#widget-category-1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-1">
    										{{ $category->name }}
    										<span class="toggle"></span>
    									</a>
                                        <div class="collapse show" id="widget-category-1">
                                            <ul class="cat-sublist">
                                                @foreach($category->children as $child)
                                                <li><a
                                                    href="{{ url('/shop/products?category='.$child->slug) }}">
                                                    {{ $child->name }}
                                                </a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('/shop/products?category='.$category->slug) }}">
                                        {{ $category->name }}
                                        </a>
                                    </li>
                                @endif


                                @endforeach
                            </ul>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .collapse -->
                </div>
                <!-- End .widget -->



</div>
<!-- End .container -->

<div class="mb-4"></div>
            <!-- margin -->
@endsection