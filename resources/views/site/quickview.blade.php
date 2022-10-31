<?php
$wishList = Auth::check() ? Auth::user()->wishlist()->pluck('products.id')->toArray() : [];
?>
<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
	<div class="row">
		<div class="col-md-6 product-single-gallery mb-md-0">
			<div class="product-slider-container">
				<div class="label-group">
					@if($product->new)
					<div class="product-label label-hot">{{ t('New','site') }}</div>
					@endif
					<!---->
					@if($product->special_price && $product->special_price > 0)
					<div class="product-label label-sale">
						-{{ number_format((($product->price - $product->special_price) / $product->price) * 100,2)}}%
					</div>
					@endif
				</div>

				<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
					@foreach($product->getMedia('images') as $img)
					<div class="product-item">
						<img class="product-single-image"
						src="{{ $img->getFullUrl() }}"
							data-zoom-image="{{ $img->getFullUrl() }}" alt="{{ $product->name }}" />
					</div>
					@endforeach

					{{-- <div class="product-item">
						<img class="product-single-image" src="{{ url('/assets/site/images/photos/02.jpeg') }}"
							data-zoom-image="{{ url('/assets/site/images/photos/02.jpeg') }}" />
					</div>
					<div class="product-item">
						<img class="{{ url('/assets/site/images/photos/03.jpeg') }}"
							data-zoom-image="{{ url('/assets/site/images/photos/03.jpeg') }}" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="{{ url('/assets/site/images/photos/04.jpeg') }}"
							data-zoom-image="{{ url('/assets/site/images/photos/04.jpeg') }}" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="{{ url('/assets/site/images/photos/05.jpeg') }}"
							data-zoom-image="{{ url('/assets/site/images/photos/05.jpeg') }}" />
					</div> --}}
				</div>
				<!-- End .product-single-carousel -->
			</div>
			<div class="prod-thumbnail owl-dots">
				@foreach($product->getMedia('images') as $img)

					<div class="owl-dot">
						<img src="{{ $img->getFullUrl() }}" />
					</div>
					@endforeach

				{{-- <div class="owl-dot">
					<img src="{{ url('/assets/site/images/photos/02.jpeg') }}" />
				</div>
				<div class="owl-dot">
					<img src="{{ url('/assets/site/images/photos/03.jpeg') }}" />
				</div>
				<div class="owl-dot">
					<img src="{{ url('/assets/site/images/photos/04.jpeg') }}" />
				</div>
				<div class="owl-dot">
					<img src="{{ url('/assets/site/images/photos/05.jpeg') }}" />
				</div> --}}
			</div>
		</div><!-- End .product-single-gallery -->

		<div class="col-md-6">
			<div class="product-single-details mb-0 ml-md-4">
				<h1 class="product-title">{{ $product->name }}</h1>

				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:60%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( 6 {{ t('Reviews','site') }} )</a>
				</div><!-- End .ratings-container -->

				<hr class="short-divider">

				<div class="price-box">
					<span class="product-price"> {{ $product->special_price ? $product->special_price : $product->price }}{{ t('SAR','site') }}</span>
				</div><!-- End .price-box -->

				<div class="product-desc">
					<p>
						{!! $product->description !!}
					</p>
				</div><!-- End .product-desc -->

				<ul class="single-info-list">
					<!---->
					{{-- <li>
						SLUG:
						<strong>654613612</strong>
					</li> --}}

					<li>
						{{ t('CATEGORY','site') }}:
						<strong>
							<a href="#" class="product-category">
								{{ $product->category ? $product->category->name:'' }}
							</a>
						</strong>
					</li>
				</ul>
				@if($product->variants()->count() > 0)
				<div class="product-filters-containers" id="variants">
					<div class="product-single-filters row">
						<label class="col-md-2" style="margin-top: 7%;">{{ t('Color','site') }}:</label>

						<div class="col-md-8">
							<select class="form-control" id="size-color-select2">
							<option value="">{{ t('Select','site') }}</option>
							@foreach($product->variants as $variant)

								<option value="{{ $variant->id }}">
								{{  ($variant->color ? $variant->color->name : '') }}
								</option>

							@endforeach
						</select>

						</div>
						<div class="col-md-2"></div>

					</div>

					{{-- <div class="product-single-filter">
						<label></label>
						<a class="font1 text-uppercase clear-btn" href="#">Clear</a>
					</div> --}}
					<!---->
				</div>
				@else
				<div class="product-filters-containers hidden" id="variants"></div>
				@endif

				<div class="product-action">
					<div class="price-box product-filtered-price">
						{{-- {{ $product->special_price }} --}}
						@if($product->special_price && $product->special_price > 0)
                            <p class="old-price" style="display:inline;">{{ $product->price .' '. t('SAR', 'site') }}</p>
                            <p class="product-price" style="display:inline;">{{ $product->special_price .' '. t('SAR','site') }}</p>
                        @else
                            <p class="product-price" style="display:inline;">{{ $product->price .' '. t('SAR','site') }}</p>
                        @endif


					</div>

					<div class="product-single-qty">
						<input class="horizontal-quantity form-control" id="quantity-input" type="text" />
					</div><!-- End .product-single-qty -->

					<a href="#" data-product-id="{{ $product->id }}" class="btn btn-dark mr-2" id="add_to_cart" title="{{ t('Add To Cart','site') }}">{{ t('Add To Cart','site') }}</a>

					{{-- <a href="cart.html" class="btn view-cart d-none">View cart</a> --}}
				</div><!-- End .product-action -->

				<hr class="divider mb-0 mt-0">

				<!--<div class="product-single-share mb-0">-->
				<!--	<label class="sr-only">{{ t('Share','site') }}:</label>-->

				<!--	<div class="social-icons mr-2">-->
				<!--		<a href="#" class="social-icon social-facebook icon-facebook" target="_blank"-->
				<!--			title="Facebook"></a>-->
				<!--		<a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>-->
				<!--		<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"-->
				<!--			title="Linkedin"></a>-->
				<!--		<a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"-->
				<!--			title="Google +"></a>-->
				<!--		<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>-->
				<!--	</div>-->
					<!-- End .social-icons -->

					<a class="btn-icon-wish addToWishlist add-wishlist{{ in_array($product->id,$wishList) ? ' added-wishlist':'' }}"
                                data-product-id="{{ $product->id }}"
                                title="{{ t('Add to Wishlist', 'site') }}"  href="#">
                                <i class="icon-wishlist-2"></i><span>
							{{ t('Add to Wishlist','site') }}</span></a>
				</div><!-- End .product single-share -->
			</div>
		</div><!-- End .product-single-details -->

		<button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
	</div><!-- End .row -->
</div><!-- End .product-single-container -->
<script type="text/javascript">

	$('#add_to_cart').click(function (e) {
		e.preventDefault();
		if($('#variants').hasClass('hidden')){
			// no variants
			let productId = $(this).attr('data-product-id');
			let url = window.location.origin;
			let quantity = parseInt($('#quantity-input').val());
			let ajaxCall = Commander.ajax(url + '/cart/addToCart', 'POST', {product_id: productId,quantity: quantity});
			if(ajaxCall.response.status.code == 200){
				if(ajaxCall.response.status.error)
			      	toastr.error(ajaxCall.response.status.message);
			    else{
			      	toastr.success(ajaxCall.response.status.message);
					// getCartData();
					location.reload();
			    }

			}
		}else{

			if(!$('#size-color-select2').val()){
				$('#size-color-select2').css('border', '1px solid red');
			}else{
				// console.log("dont select Size");
				// has variants
				let productId = $('#size-color-select2').val();
				let quantity = parseInt($('#quantity-input').val());
				let url = window.location.origin;
				let ajaxCall = Commander.ajax(url + '/cart/addToCart', 'POST', {product_id: productId, quantity: quantity});
				if(ajaxCall.response.status.code == 200){
					if(ajaxCall.response.status.error)
				      	toastr.error(ajaxCall.response.status.message);
				    else{
						// getCartData();
				      	toastr.success(ajaxCall.response.status.message);
				      	location.reload();
				    }

				}

				// $('#addCartModal .variants').addClass('hidden');
				// $('.mfp-close').click();

			}

		}

	})

	$('.addToWishlist').click(function(e){
		e.preventDefault();
		console.log("heloo");
		let url = window.location.origin;
		let productId = $(this).attr('data-product-id');
		let ajaxCall = Commander.ajax(url + '/wishlist/' + productId + '/add');
		// console.log('api: ', url + '/wishlist/' + productId + '/add');
		// console.log('response: ', ajaxCall.response);
		// $this.addClass( 'load-more-overlay loading' );
		if(ajaxCall.response.status.code == 200){
			if(ajaxCall.response.status.error)
		      	toastr.error(ajaxCall.response.status.message);
		    else{
		      	sessionStorage.setItem("message-success", ajaxCall.response.status.message);
		      	// if(ajaxCall.response.data.added){
			      // 	$(this).html('<i class="fas fa-heart" style="color:#bd3036" title="Remove from wishlist"></i>');
		      	// }else{
			      // 	$(this).html('<i class="icon-heart" title="Add to wishlist"></i>');
		      	// }
		      	document.location.reload(true);
		    }
		}else{
	      	toastr.error('Some thing went wrong!');
		}
	});
</script>