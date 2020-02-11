<?php

namespace App\Providers;

use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\ServiceProvider;

class PlacetoPayProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlacetoPay::class, function($app) {
            return new PlacetoPay([
                'login' => config('placetopay.login'),
                'tranKey' => config('placetopay.trankey'),
                'url' => config('placetopay.url'),
            ]);
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

