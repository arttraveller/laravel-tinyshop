<?php

namespace App\Providers;

use App\Services\Product\ProductsCategoriesManageService;
use App\Services\Product\ProductsCharacteristicsManageService;
use App\Services\Product\ProductsManageService;
use App\Services\Product\ProductsTagsManageService;
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
        $this->app->singleton('App\Services\Product\ProductManageService', function () {
            return new ProductsManageService(new ProductsCategoriesManageService(), new ProductsTagsManageService(), new ProductsCharacteristicsManageService());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
