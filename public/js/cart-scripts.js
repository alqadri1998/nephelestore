"use strict";

$(document).ready(function() {
	$('.btn-add-cart').click(function(e){

		let url = window.location.origin;
		var variant = $(this).data('variant');
		let productId = $(this).attr('data-product-id');
		let ajaxCall = Commander.ajax(url + '/products/' + productId + '/getVariants');
		console.log('response: ', ajaxCall.response);

		$('.AddToCart').attr('data-product-id', productId);
		
		if(ajaxCall.response.status.code == 200){

			let data = ajaxCall.response.data;
				
			if(Object.keys(data).length > 0){
			// console.log('yes lin > 0');
				// If has data
				$('#addCartModal .variants').removeClass('hidden');
				$('#size-color-select').html('<option value="">Select</option>');
				data.color.forEach((item) => {
					
					if(variant && variant != ''){
						$('#size-color-select').append('<option data-price="' + item.price + '" value="' + item.id + '"'+(variant == item.id ? 'selected':'')+' > ' + item.color + '</option>');
						if(variant == item.id ){
							let price = item.price;
							let quantity =1;
							if(price != undefined && quantity != undefined){
								$('#price-span').html(price * quantity);
								// $('#price-span').html('$' + price * quantity);
							}else{
								$('#price-span').html('');
							}
						}
	
					}else{

						$('#size-color-select').append('<option data-price="' + item.price + '" value="' + item.id + '" > ' + item.color + '</option>');
					}
					// console.log('ahmed', item);
				});
			}

		}else{
	      	toastr.error('Some thing went wrong!');
		}
	});

	$('#size-color-select').change(function () {
		let price = $(this).find(':selected').attr('data-price');
		let quantity = parseInt($('#quantity-input').val());
		if(price != undefined && quantity != undefined){
			$('#price-span').html(price * quantity);
			// $('#price-span').html('$' + price * quantity);
		}else{
			$('#price-span').html('');
		}
	});

	$('#quantity-input').change(function () {
		// alert($(this).val());
		let price = $('#size-color-select').find(':selected').attr('data-price');
		let quantity = parseInt($(this).val());
		// console.log('q '+quantity *price);
		if(price != undefined && quantity != undefined){
			$('#price-span').html( price * quantity);
			// $('#price-span').html('$' + price * quantity);
		}else{
			$('#price-span').html('');
		}
	})
	$('#quantity-input-single').change(function () {
		
		let price = $('#price-span-single').html();
		let quantity = parseInt($(this).val());
		if(price != undefined && quantity != undefined){
			console.log('a', (price * quantity));
			$('#price-span-single').html( price * quantity);
		}else{
			$('#price-span-single').html('');
		}
	})	

	$('.AddToCart').click(function (e) {
		e.preventDefault();
		console.log("sss");
		if($('.variants').hasClass('hidden')){
			// no variants
			let productId = $(this).attr('data-product-id');
			let url = window.location.origin;
			let quantity = parseInt($('#quantity-input-single').val());
			let ajaxCall = Commander.ajax(url + '/cart/addToCart', 'POST', {product_id: productId,quantity: quantity});
			if(ajaxCall.response.status.code == 200){
				if(ajaxCall.response.status.error)
			      	toastr.error(ajaxCall.response.status.message);
			    else{
			      	toastr.success(ajaxCall.response.status.message);
					getCartData();
					$('#addCartModal .variants').addClass('hidden');
					$('.btnCancelModal').click();
			    }
			}
		}else{
			if($('#size-color-select').val() == ''){
				$('#size-color-select').css('border', '1px solid red');
			}else{
				// has variants
				let productId = $('#size-color-select').val();
				let quantity = parseInt($('#quantity-input').val());
				let url = window.location.origin;
				let ajaxCall = Commander.ajax(url + '/cart/addToCart', 'POST', {product_id: productId, quantity: quantity});
				if(ajaxCall.response.status.code == 200){
					if(ajaxCall.response.status.error)
				      	toastr.error(ajaxCall.response.status.message);
				    else{
						getCartData();
				      	toastr.success(ajaxCall.response.status.message);
				    }
				    	
				}

				$('#addCartModal .variants').addClass('hidden');
				$('#addCartModal .single-product').addClass('hidden');
				$('.btnCancelModal').click();
			}
			
		}
		
	})

	$('.btnCancelModal').click(function () {
		$('#quantity-input').val(1);
		$('#quantity-input-single').val(1);
		$('#price-span').html('');
		$('#price-span-single').html('');
		$('#addCartModal .variants').addClass('hidden');
		$('#addCartModal .single-product').addClass('hidden');
	});

	function getCartData(){

		let url = window.location.origin;
		let ajaxCall = Commander.ajax(url + '/cart/json');
		if(ajaxCall.response.status.code == 200){
			if(ajaxCall.response.status.error == false){
				
				//  function getCookie(name) {
				//   const value = `; ${document.cookie}`;
				//   const parts = value.split(`; ${name}=`);
				//   if (parts.length === 2) return parts.pop().split(';').shift();
				// }

		      	// set cart data
				var cartItems = ajaxCall.response.data.cartItems;


				var subTotal = ajaxCall.response.data.subTotal;
				var totalQuantity = ajaxCall.response.data.totalQuantity;
				//Counter Item in cart
				$('.cart-dropdown .cart-count').html(cartItems.length);

				// $('.total-quantity').html(totalQuantity + ' Items');
				//Subtotal 
				$('.cart-total-price').html(subTotal);
				
				$('.dropdown-cart-products').html('');
				cartItems.forEach(function(item) {
					// console.log(item);
					var row = '<div class="product">';
						row += '<div class="product-details">';
						row += '<h4 class="product-title">';
						row += '<a href="'+url + '/' + item.slug+'">'+item.name+'</a>';
						row += '</h4><span class="cart-product-info">';
						row += '<span class="cart-product-qty">'+item.quantity+'</span> × '+item.price+'</span></div>';
						row += '<figure class="product-image-container">';
						row += '<a href="'+url + '/' + item.slug+'" class="product-image">';
						row += '<img src="'+item.thumb+'" alt="'+item.name+'" width="80" height="80"></a>';
						// row += '<a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>';
						row += '</figure></div>';
					$('.dropdown-cart-products').append(row);
				});
			}
		}
	}

	getCartData();

});