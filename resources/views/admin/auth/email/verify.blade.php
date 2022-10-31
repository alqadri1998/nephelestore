<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">{{ t('Reset Password') }}</div>
                   <div class="card-body">
                    <a href="{{ route('admin.reset-password', $token) }}">{{ t('click Here') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>