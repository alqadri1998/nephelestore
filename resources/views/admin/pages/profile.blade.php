<?php
    $authUser = Auth::user();
?>
@extends('admin.layouts.app')

@section('head')
@endsection

@section('content')
		    <div class="card">
		        <div class="card-header">
		            <h5>{{ __('admin.Profile') }}</h5>
		        </div>
		        <div class="card-body">
					<form method="post" action="{{ route('admin.profileUpdate') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="user_type" value="admin">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="font-weight-bolder text-dark" for="inputAddress">{{ __('admin.Name')}}</label>
								<input type="text" class="form-control" id="inputAddress" name="username" value="{{ $authUser->name }}">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bolder text-dark" for="inputEmail4">{{ __('admin.admins.Email')}}</label>
								<input type="email" class="form-control dirLeft" id="inputEmail4" name="email" value="{{ $authUser->email }}">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bolder text-dark" for="inputEmail4">{{ __('admin.admins.Mobile')}}</label>
								<input type="text" class="form-control dirLeft" id="inputEmail4" name="mobile" value="{{ $authUser->mobile }}">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bolder text-dark" for="inputPassword4">{{ __('admin.admins.Password')}}</label>
								<input type="password" class="form-control dirLeft" id="inputPassword4" name="password" >
							</div>
					    
						</div>
					    <div class="input-group mb-3">
					        <div class="input-group-prepend">
					            <span class="input-group-text">{{ __('admin.admins.change profile picture') }}</span>
					        </div>
					        <div class="custom-file">
					            <input type="file" name="image" class="custom-file-input" accept="image/x-png,image/gif,image/jpeg" id="imgInp" />
					            <label class="custom-file-label" for="inputGroupFile01">{{ t('Choose file') }}</label>
					        </div>
					    </div>
					    <div class="form-group" style="text-align: center;">
					      <img class="img-thumbnail" style="width: 100px;margin-bottom: 20px;" src="{{ $authUser->image ? url($authUser->image) : url('/assets/admin/media/users/300_21.jpg') }}" alt="user"width="120" id="blah">
					    </div>
					    <div class="form-group" style="text-align: center;">
						    <button type="submit" class="btn btn-primary">{{ __('admin.save')}}</button>
						</div>
					</form>
		        </div>
		    </div>
@endsection

@section('scripts')
<script>
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
  // $('#copyInput')
  $('#copyClick').on('click', function () {
  	
    // Create a "hidden" input
  var aux = document.createElement("input");

  // Assign it the value of the specified element
  aux.setAttribute("value", document.getElementById('copyInput').value);
  // Append it to the body
  document.body.appendChild(aux);

  // Highlight its content
  aux.select();

  // Copy the highlighted text
  document.execCommand("copy");

  // Remove it from the body
  document.body.removeChild(aux);
  alert('تم النسخ بنجاح');
  });

</script>


@endsection