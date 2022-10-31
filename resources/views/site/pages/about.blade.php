@extends('site.layouts.app')
@section('title')
| {{ t('About Us' , 'site') }}
@endsection
@section('content')
 <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">{{ t('About Us' , 'site') }}</li>
        </ol>
    </div><!-- End .container -->
</nav>

<div class="container">
    {!! $page->body !!}

    <div class="mb-3"></div><!-- margin -->
</div>

@endsection
@section('scripts')

@endsection