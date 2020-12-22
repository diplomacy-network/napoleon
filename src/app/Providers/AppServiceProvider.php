<?php

namespace App\Providers;

use App\Utility\Adjudicator\AdjudicatorInterface;
use App\Utility\Adjudicator\CliAdjudicator;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(AdjudicatorInterface::class, CliAdjudicator::class);

    }
}
