"use strict";

$(document).ready(function() {
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

	$('.removeFromWishList').click(function(e){
		let url = window.location.origin;
		let productId = $(this).attr('data-product-id');
		let wishlistCount = parseInt($('#wishlistCount').text());
		
		
		let ajaxCall = Commander.ajax(url + '/wishlist/' + productId + '/remove');
		if(ajaxCall.response.status.code == 200){
			if(ajaxCall.response.status.error)
		      	toastr.error(ajaxCall.response.status.message);
		    else
		      $('#'+productId).remove();
		      $('#wishlistCount').html(wishlistCount-1);
		      	toastr.success(ajaxCall.response.status.message);
		}else{
	      	toastr.error('Some thing went wrong!');
		}
	});
});