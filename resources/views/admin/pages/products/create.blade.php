@extends('admin.layouts.app')

@section('head')
	<style>

	</style>
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.create'),
	'menu'      => [
		__('admin.products.index') => route('admin.products.index'),
		__('admin.create') => route('admin.products.create'),
	],
	])
	@endsection

	@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<h3 class="card-title">{{ __('admin.create') }}</h3>
				</div>
				@include('admin.pages.products.form')
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
    @include('admin.pages.products.wizard-1')
	<script src="{{url('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
	<script>
		$(document).ready(function(){
            $("#sub_package").hide();

			$('body').on('click', '.btnDelete', function(e){
				e.preventDefault();
				$(this).parents('tr').remove();
				KTWizard1.init();
			});

			$('.btn-add-variant').click(function(e){
				e.preventDefault();
				var row = $('.variant-tr').first().clone();
				$(row).css('display', 'table-row');
				$(row).removeClass('variant-tr');
				$('#kt_advance_table_widget_1').append(row);
				KTWizard1.init();
				fixImages();
			});

			$('.btn-next').click(function(e){
				$('#kt_select2_1, #kt_select2_2, #kt_select2_3, #kt_select2_4').select2({
					placeholder: 'إختر'
				});
				// checkVariantsVisibility();
			});
			$('.btn-prev').click(function(e){
				$('#kt_select2_1, #kt_select2_2, #kt_select2_3, #kt_select2_4').select2({
					placeholder: 'إختر'
				});
				// checkVariantsVisibility();
			});
    // $('.uppy-DragDrop-label').html('قم بسحب الصور وافلاتها او إضغط هنا')
    $('.btnAddImg').click(function(){
    	var el = $('#kt_image').clone();
    	var id = el.attr('id') + Math.random().toString(36).substring(7);
    	el.attr('id', id);
    	el.removeAttr('hidden');
    	$('.img-container').append(el);
    	new KTImageInput(id);
    });

    $('.sizeInput').change(function() {
    	if($(this).val() < 1){
    		$(this).val(1)
    	}
    })

	// $('body').on('change', '.color-variant', function() {
	// 	if($(this).val() == ''){
	// 		$(this).parents('tr').find('.input-td .img-container-colors').css('display', 'none');
	// 	}else{
	// 		$(this).parents('tr').find('.input-td .img-container-colors').css('display', 'block');
	// 	}
	// 	fixImages();
	// })

	// $('#kt_select2_1').change(function () {
	//     	checkVariantsVisibility();
	//     	getBrands();
	// });
});

function fixImages(){
	$('.kt_image_colors').each(function (item, img) {
		id = 'kt_' + Math.random().toString(36).substring(7);
		$(img).attr('id', id);
		new KTImageInput(id);
	})
}
// function checkVariantsVisibility(){
//     	if($('option:selected', '#kt_select2_1').attr('data-has-attributes') == false){
// 		$('#product-variants-step').removeAttr('data-wizard-type');
// 		$('#product-variants-step').css('display', 'none');

// 		$('#product-variants-content').removeAttr('data-wizard-state');
// 		$('#product-variants-content').removeAttr('data-wizard-type');
// 		$('#product-variants-content').removeClass('pb-5');
// 		$('#product-variants-content').css('display', 'none');
// 		$('.stockDiv').css('display', 'block');
//     	}else{
//     		$('#product-variants-step').attr('data-wizard-type', 'step');
//     		$('#product-variants-step').css('display', 'flex');
//     		$('#product-variants-content').attr('data-wizard-type', 'step-content');
//     		$('#product-variants-content').addClass('pb-5');
//     		$('#product-variants-content').removeAttr('style');
// 		$('.stockDiv').css('display', 'none');
//     	}
// }
// function getBrands() {
// 	let url = window.location.origin;
// 	let productId = $('#kt_select2_1').val();
// 		console.log(productId);
// 	if(productId != undefined && productId != ''){
// 		let ajaxCall = Commander.ajax(url + '/marketer/brands/' + productId);
// 		if(ajaxCall.response.status.code == 200){
// 			let data = ajaxCall.response.data;
// 			if(data.length > 0){
// 				data.forEach((item) => {
// 					$('#kt_select2_2').append('<option value="' + item.id + '" > ' + item.name + '</option>');
// 				});
// 			}
// 		}
// 	}
// }
</script>
<script>
    function packageCheck() {
        console.log(1);
        if ($('#main_package').is(':checked')) {
            console.log(2);

            // $('#sub_package').css('display:none;')
            $("#sub_package").hide();
        } else {
            console.log(3);
    $("#sub_package").show();
            console.log($('#sub_package'));
            // $('#sub_package').css('display:block;')

        }
        console.log(4);
    }
</script>
@endsection
