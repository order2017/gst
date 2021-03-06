<?php

namespace App\Providers;

use App\Common\Common;
use App\Common\PublicFunction;
use App\Common\SearchKey;
use App\Common\SmsFunction;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('common',function (){

            return new Common(new PublicFunction(),new SmsFunction(),new SearchKey());

        });
    }
}
