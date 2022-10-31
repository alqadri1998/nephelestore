$(document).ready(function() {
    "use strict";
    // $('<span class="asterisk">*</span>').insertBefore(':input[required]:not(.no-star)');

    $('.btn-delete').click(function(e) {
        e.preventDefault();
        var _this = $(this);
    	Swal.fire({
    		text: "Are you sure you want to delete this item ?",
    		icon: "error",
    		showCancelButton: true,
    		buttonsStyling: false,
    		confirmButtonText: "Yes",
    		cancelButtonText: "No",
    		customClass: {
    			confirmButton: "btn font-weight-bold btn-primary",
    			cancelButton: "btn font-weight-bold btn-default"
    		}
    	}).then(function (result) {
            console.log(result);
            if(result.value){
                console.log(_this);
        		_this.parents('form').submit();
            }
    	});
    });

    $('.activeBtn').change(function(event){
        if(!$(this).is(':checked')){
        	if($('.activeBtn:checked').length == 0){
        		$(this).prop('checked',true);
        	}
        }
    });

    $('.deleteImgIcon').click(function() {
        var route = $(this).attr('data-route');
        var parentInput = $(this).parents('.image-input');
        var item = $(this).parents('.btn-circle').siblings('.image-input-wrapper');
        var btn = $(this).parents('.btn-circle');
        var _this = $(this)
        Swal.fire({
            text: "متأكد من حذف هذه الصوره ؟",
            icon: "success",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn font-weight-bold btn-primary",
                cancelButton: "btn font-weight-bold btn-default"
            }
        }).then(function (result) {
            if (result.value) {
                item.css('background-image', 'url(/assets/admin/media/placeholder.png)');
                $.ajax({
                    url: route,
                    type:'get',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(response) {
                        if(response.success){
                            Swal.fire({
                                text: "تم جذف الصوره",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light"
                                }
                            }).then(function () {
                                _this.remove();
                                btn.append('<i class="fa fa-pen icon-sm text-muted"></i>');
                                btn.append('<input type="file" name="images[]" accept=".png, .jpg, .jpeg" />');
                                new KTImageInput(parentInput.attr('id'));
                            });
                        }
                    },
                });
            }
        });
    });

});