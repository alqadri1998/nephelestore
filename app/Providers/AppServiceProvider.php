<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('settings')){
            view()->share('settings', Setting::pluck('value', 'key')->toArray());
        }
    }
}
