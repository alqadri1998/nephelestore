@extends('site.layouts.app')
@section('title')
| {{ t('Wishlist' , 'site') }}
@endsection
@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home', 'site') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ t('Wishlist' , 'site') }}
                    </li>
                </ol>
            </div>
        </nav>

        <h1>{{ t('Wishlist' , 'site') }}</h1>
    </div>
</div>

<div class="container">
    <div class="wishlist-title">
        <h2 class="p-2 text-right-rtl">{{ t('My Wishlist Products' , 'site') }}</h2>
    </div>
    @if(count($items) > 0)
    <div class="wishlist-table-container">
        <table class="table table-wishlist mb-0">
            <thead>
                <tr>
                    <th class="thumbnail-col"></th>
                    <th class="product-col">{{ t('Product','site') }}</th>
                    <th class="price-col">{{ t('Price','site') }}</th>
                    {{-- <th class="status-col">Stock Status</th> --}}
                    <th class="action-col">{{ t('Actions','site') }}</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($items as $item)
                <tr class="product-row" id="{{ $item->id }}">
                    <td>
                        <figure class="product-image-container">
                            <a href="{{ route('product.show', $item->slug) }}" class="product-image">
                            	@if($item->getFirstMedia('thumb'))
                                <img src="{{ $item->getFirstMedia('thumb')->getFullUrl() }}" alt="{{ $item->name }}">
                                @endif
                            </a>

                            <a href="#" class="btn-remove icon-cancel removeFromWishList" data-product-id="{{ $item->id }}" title="{{ t('Remove Product','site') }}"></a>
                        </figure>
                    </td>
                    <td>
                        <h5 class="product-title">
                            <a href="#">{{ $item->name }}</a>
                        </h5>
                    </td>
                    <td class="price-box">{{ $item->special_price ?? $item->price }} {{ t('SAR','site') }}</td>
                  
                    <td class="action">
                        <a href="#" class="btn btn-quickview mt-1 mt-md-0" data-slug="{{ $item->slug }}"
                            title="{{ t('Quick View','site') }}">{{ t('Quick View','site') }}</a>
                        <button class="btn btn-dark btn-add-cart product-type-simple btn-shop" data-image="{{ $item->getFirstMedia('thumb') ?$item->getFirstMedia('thumb')->getFullUrl() :'' }}" data-toggle="modal" data-target="#addCartModal" data-product-id="{{ $item->id }}" >
                            {{ t('Add To Cart','site') }}
                        </button>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div><!-- End .cart-table-container -->
    @else
    <h2 class="text-center">{{ t('You don\'t have any products','site') }}</h2>
    @endif
</div><!-- End .container -->
@endsection
@section('scripts')
    {{-- <script> --}}
@endsection