@extends('site.layouts.app')
@section('title')
| {{ t('Contact Us' , 'site') }}
@endsection
@section('content')

	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="{{ route('home') }}">{{ t('Home','site') }}</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					{{ t('Contact Us' , 'site') }}
				</li>
			</ol>
		</div>
	</nav>

	{{-- contact-info --}}
	<div class="contact-info">
		<div class="container">
			<h2 class="text-center">
				{{ t('Contact Us', 'site') }}
			</h2>
			<div class="boxs">
				<div class="row">
					<div class="col-sm-6 col-lg-4">
						<div class="feature-box text-center">
							<div class="image-circle">
								<i class="sicon-location-pin"></i>
							</div>
							<div class="feature-box-content">
								<h3>{{ t('Address','site') }}</h3>
								<h5>{{ $setting['location'] ?? '' }}</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4">
						<div class="feature-box text-center">
							<div class="image-circle">
								<i class="fa fa-mobile-alt"></i>
							</div>
							<div class="feature-box-content">
								<h3>{{ t('Mobile','site') }}</h3>
								<h5>{{ $setting['mobile'] ?? '' }}</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-lg-4">
						<div class="feature-box text-center">
							<div class="image-circle">
								<i class="far fa-envelope"></i>
							</div>
							<div class="feature-box-content">
								<h3>{{ t('Email address','site') }}</h3>
								<h5>{{ $setting['email'] ?? '' }}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</div>
	{{-- end contact-info --}}
		{{-- Contact Form --}}
	<div class="container contact-us-container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-lg-8">
				<h2 class="mt-6 mb-2 text-center">{{ t('Leave us your message and we will reply to you as soon as possible','site') }}</h2>

				<form class="mb-0" action="{{ route('contact.send') }}" method="post">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="mb-1" for="contact-name">{{ t('Your Name','site') }}
									<span class="required">*</span></label>
								<input type="text" class="form-control" id="contact-name" name="name"
									required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="mb-1" for="contact-email">{{ t('Your Email','site') }}
									<span class="required">*</span></label>
								<input type="email" class="form-control" id="contact-email" name="email"
									required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="mb-1" for="contact-mobile">{{ t('Mobile','site') }}
									<span class="required">*</span></label>
								<input type="text" class="form-control" id="contact-mobile" name="mobile"
									required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="mb-1" for="subject">{{ t('Subject','site') }}
									<span class="required">*</span></label>
								<input type="text" class="form-control" id="subject" name="subject"
									required />
							</div>
						</div>
					</div>
					

					
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="mb-1" for="contact-message">{{ t('Your Message','site') }}
									<span class="required">*</span></label>
								<textarea cols="30" rows="1" id="contact-message" class="form-control"
									name="message" required></textarea>
							</div>
						</div>
					</div>
					

					<div class="form-footer mb-0">
						<button type="submit" class="btn btn-dark font-weight-normal">
							{{ t('Send Message','site') }}
						</button>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>

			{{-- <div class="col-lg-6">
				<h2 class="mt-6 mb-1">{{ t('Location','site') }}</h2>
				<div class="location">
					{!! $setting['contact_us_map_html'] ?? '' !!}
				</div>
				
			</div> --}}
		</div>
	</div>

	<div class="mb-8"></div>

@endsection
@section('scripts')

@endsection