<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\ListBag\components\BuildForm;
use App\Helpers\ListBag\components\ResultSearch;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach (glob(app_path('Helpers') . '/*.php') as $file) {
            require_once $file;
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(app_path('Helpers/ListBag/resources/views'),'ListBag');
        Blade::component('BuildForm', BuildForm::class);
        Blade::component('ResultSearch', ResultSearch::class);
    }
}
