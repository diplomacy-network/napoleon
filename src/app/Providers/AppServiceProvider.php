<?php

namespace App\Providers;

use App\Utility\Adjudicator\AdjudicatableInterface;
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
        $this->app->bind(AdjudicatableInterface::class, CliAdjudicator::class);
        
    }
}
