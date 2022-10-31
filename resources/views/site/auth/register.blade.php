@extends('site.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-8 offset-md-2">
                        
                    <!-- Register Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>{{ t('Register As User','site') }} <a href="{{ route('salon.showRegister') }}">{{ t('Are you a service provider?','site') }}</a></h3>
                                </div>
                                <!-- Register Form -->
                                <form action="{{ route('register') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group form-focus">
                                        <input type="text" class="form-control floating" name="name" value="{{ old('name') }}" required>
                                        <label class="focus-label"><span class="red">*</span> {{ t('Name','site') }}</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="text" class="form-control floating" name="mobile" value="{{ old('mobile') }}" required>
                                        <label class="focus-label"><span class="red">*</span> {{ t('Mobile Number','site') }}</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="email" class="form-control floating" name="email" value="{{ old('email') }}" required>
                                        <label class="focus-label"><span class="red">*</span> {{ t('Email','site') }}</label>
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" class="form-control floating" name="password" required>
                                        <label class="focus-label"><span class="red">*</span> {{ t('Password','site') }}</label>
                                    </div>
                                    <div class="text-end">
                                        <a class="forgot-link" href="{{ route('login') }}">{{ t('Already have an account?', 'site') }}</a>
                                    </div>
                                    <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">{{ t('Signup','site') }}</button>
                                    {{-- <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="row form-row social-login">
                                        <div class="col-6">
                                            <a href="#" class="btn btn-facebook w-100"><i class="fab fa-facebook-f me-1"></i> Login</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i> Login</a>
                                        </div>
                                    </div> --}}
                                </form>
                                <!-- /Register Form -->
                            </div>
                        </div>
                    </div>
                    <!-- /Register Content -->
                        
                </div>
            </div>

        </div>

    </div>      
    <!-- /Page Content -->    
@endsection