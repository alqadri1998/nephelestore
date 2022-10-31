@extends('site.layouts.app')

@section('content')	
<!-- Page Content -->
<div class="page-header">
		<div class="container d-flex flex-column align-items-center">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
	                    <li class="breadcrumb-item"><a href="{{ route('shop') }}">{{ t('Shop','site') }}</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">
	                       {{ t('My Account', 'site') }}
	                    </li>
	                </ol>
				</div>
			</nav>

			<h1>{{ t('My Account', 'site') }}</h1>
		</div>
	</div>
	<div class="container reset-password-container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-lg-6 col-md-6">
				<div class="feature-box border-top-primary">
					<div class="feature-box-content">
						<form class="mb-0 form-login" action="{{ route('reset-password') }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="email" value="{{ $email }}">
								<input type="hidden" name="code" value="{{ $code }}">
							<p>{{ t('Reset Password','site') }}</p><hr>
							<div class="form-group mb-0">
								<label for="password" class="font-weight-normal">{{ t('Password','site') }}</label>
								<input type="password" class="form-control" id="password" name="password" required />
							</div>
							<div class="form-group mb-0">
								<label for="password_confirmation" class="font-weight-normal">{{ t('Password Confirm','site') }}</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
							</div>

							<div class="form-footer mb-0">
								{{-- <a href="login.html">Click here to login</a> --}}

								<button type="submit"
									class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
									{{ t('Reset Password','site') }}
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>	
		
@endsection
   