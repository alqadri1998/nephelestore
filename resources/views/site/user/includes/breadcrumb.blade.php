<div class="breadcrumb-bar">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-12 col-12">
				<nav aria-label="breadcrumb" class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home', 'site') }}</a></li>
						@if(isset($level))
						<li class="breadcrumb-item"><a href="{{ $level['route'] }}">{{ t( $level['title'], 'site') }}</a></li>
						@endif
						<li class="breadcrumb-item active" aria-current="page">{{ t($pageTitle, 'site') }}</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">{{ t($pageTitle, 'site') }}</h2>
			</div>
		</div>
	</div>
</div>