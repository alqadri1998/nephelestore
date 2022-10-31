@extends('site.layouts.app')

@section('content')
			
<!-- Breadcrumb -->
@include('site.user.includes.breadcrumb', ['pageTitle'=> 'Dashboard'])

<!-- /Breadcrumb -->
			
<!-- Page Content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
				<!-- Profile Sidebar -->
				<div class="profile-sidebar">
					<div class="widget-profile pro-widget-content">
						@include('site.user.includes.profile-info-widget')
					</div>
					<div class="dashboard-widget">
						@include('site.user.includes.dashboard-menu')
					</div>
				</div>
				<!-- /Profile Sidebar -->
			</div>
			
			<div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('user.changePassword') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="label">{{ t('Password','site') }} <span class="red">*</span> </label>
                                                <input type="password" class="form-control mt-2" name="password" value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="label">{{ t('Password Confirmation','site') }} <span class="red">*</span> </label>
                                                <input type="password" class="form-control mt-2" name="password_confirmation" value="{{ old('name') }}">
                                            </div>
                                            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">{{ t('Update','site') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>

	</div>

</div>		
@endsection

@section('scripts')	
    <script>
        $(document).ready(function () {
            $('.visit-btns').click(function () {
                $('.visit-btns input').prop('checked', false).removeAttr('checked');
                $(this).find('input').prop('checked', true).attr('checked', true);
            })
        })
    </script>
@endsection