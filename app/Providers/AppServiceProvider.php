<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*---For local registration of telecope using --dev*/
        //if ($this->app->isLocal()) {
        //   $this->app->register(TelescopeServiceProvider::class);
        //}

        $this->app->bind(

            \App\Repositories\UserRepository::class,
            \App\Repositories\DbUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { }
}
