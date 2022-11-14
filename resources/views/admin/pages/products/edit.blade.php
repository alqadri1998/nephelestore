@extends('admin.layouts.app')

@section('head')
	<style>

	</style>
@endsection

@section('breadcrumb')
@include('admin.includes.breadcrumb', [
	'title'     => __('admin.edit'),
	'menu'      => [
		__('admin.products.index') => route('admin.products.index'),
		__('admin.edit') => route('admin.products.edit', $item->id),
	],
	])
	@endsection

	@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<h3 class="card-title">{{ __('admin.edit') }}</h3>
				</div>
				@include('admin.pages.products.form', ['item'  => $item])
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
    @include('admin.pages.products.wizard-1')
	<script src="{{url('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
    @if ($item->pag_id == 0)
<script>
    $(document).ready(function(){
            $("#sub_package").hide();
    });
</script>
    @endif
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
		<script>

			$(document).ready(function(){
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
				});

				$('.btn-next').click(function(e){
					$('#kt_select2_1, #kt_select2_2, #kt_select2_3, #kt_select2_4').select2({
						placeholder: 'إختر'
					});
					// checkVariantsVisibility();
					getBrands();
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
	//     	}else{
	//     		$('#product-variants-step').attr('data-wizard-type', 'step');
	//     		$('#product-variants-step').css('display', 'flex');
	//     		$('#product-variants-content').attr('data-wizard-type', 'step-content');
	//     		$('#product-variants-content').addClass('pb-5');
	//     		$('#product-variants-content').removeAttr('style');
	//     	}
	// }

	</script>
@endsection
