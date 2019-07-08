<?php

namespace App\Providers;

use App\Services\Twitter;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //lesson code
        $this->app->singleton(Twitter::class, function () {
            //return new Twitter('api-key');
            /*Lesson 22 setting the env global variable*/
            return new Twitter(config('services.twitter.secret'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
