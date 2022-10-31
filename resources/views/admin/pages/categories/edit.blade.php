@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.edit'),
        'menu'      => [
            __('admin.categories.index') => route('admin.categories.index'),
            __('admin.edit') => route('admin.categories.edit', $item->id),
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
                @include('admin.pages.categories.form', ['item'  => $item])
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
      	$('#blah').css('display', 'block');
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
    $(document).ready(function () {
        $('.submitBtn').click(function (e) {
            e.preventDefault();
            if($('#ar-name').val().trim() == ''){
                Swal.fire("{{t('Category Arabic Name Required')}}", "", "danger");
                $('.nav-link').removeClass('active');
                $('#english').removeClass('show');
                $('#english').removeClass('active');

                $('#arabicTab').addClass('active');
                $('#arabic').addClass('active');
                $('#arabic').addClass('show');
            }else if($('#en-name').val().trim() == ''){

                Swal.fire("{{t('Category English Name Required')}}", "", "danger");
                $('.nav-link').removeClass('active');
                $('#arabic').removeClass('show');
                $('#arabic').removeClass('active');

                $('#englishTab').addClass('active');
                $('#english').addClass('active');
                $('#english').addClass('show');
            }else{
                this.form.submit();
            }
        });
    })
</script>
@endsection