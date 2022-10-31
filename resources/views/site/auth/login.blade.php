@extends('site.layouts.app')
@section('title')
| {{ t('Login' , 'site') }}
@endsection
@section('content')
 <div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ t('Home','site') }}</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ route('shop') }}">{{ t('Shop','site') }}</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">
                       {{ t('My Account', 'site') }}
                    </li>
                </ol>
            </div>
        </nav>

        <h1>{{ t('My Account', 'site') }}</h1>
    </div>
</div>

<div class="container login-container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading mb-1">
                        <h2 class="title">{{ t('Login','site') }}</h2>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="form-login">
                        {{ csrf_field() }}
                        <label for="login-email">
                            {{  t('email address or mobile', 'site')}}
                            <span class="required">*</span>
                        </label>
                        <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="text" class="form-input form-wide" name="email" id="login-email" required />

                        <label for="login-password">
                            {{ t('Password', 'site') }}
                            <span class="required">*</span>
                        </label>
                        <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="password" class="form-input form-wide" name="password" id="login-password" required />

                        <div class="form-footer2">
                            <div class="custom-control custom-checkbox2 mb-0">
                                
                                <input type="checkbox" class="custom-control-input" id="lost-password" name="remember" />
                                <label class="custom-control-label mb-0 checkbox" for="lost-password">{{ t('Remember me','site') }}</label>
                                
                            </div>
                            <br>
                            <a style="display: block;" href="{{ route('forgotPassword') }}" class="forget-password text-dark form-footer-right">
                            {{ t('Forgot Password?','site') }}
                        </a>
                        <br>
                        </div>
                        <button type="submit" class="btn btn-dark btn-md w-100">
                            {{ t('Login','site') }}
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="heading mb-1">
                        <h2 class="title">{{ t('Register','site') }}</h2>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="form-login">
                        {{ csrf_field() }}
                        {{-- name --}}
                        <label for="name">
                            {{ t('Name','site') }}
                            <span class="required">*</span>
                        </label>
                        <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="text" class="form-input form-wide" name="name" id="name" required />
                        {{-- Mobile --}}
                        <label for="mobile">
                            {{ t('Mobile','site') }}
                            <span class="required">*</span>
                        </label>
                        <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" type="text" class="form-input form-wide" name="mobile" id="mobile" required />

                        {{-- Email --}}
                        <label for="register-email">
                            {{ t('Email address','site') }}
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email" class="form-input form-wide" id="register-email" required />
                        {{-- Password --}}
                        <label for="register-password">
                            {{ t('Password','site') }}
                            <span class="required">*</span>
                        </label>
                        <input dir="{{ app()->getLocale() == 'ar' ? 'rtl':'ltr' }}" name="password" type="password" class="form-input form-wide" id="register-password"
                            required />

                        <div class="form-footer mb-2">
                            <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                {{ t('Register','site') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection