<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Woocommerce\WoocommerceInterface;
use App\Repositories\Woocommerce\WoocommerceRepository;
use App\Repositories\Zoho\ZohoInterface;
use App\Repositories\Zoho\ZohoRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WoocommerceInterface::class, WooCommerceRepository::class);
        $this->app->bind(ZohoInterface::class, ZohoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
