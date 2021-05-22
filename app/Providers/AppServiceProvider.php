<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use App\Models\Shop;

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
        if(env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        if(Schema::hasTable('shops')) {
            $toko = Shop::first();
        }

        View::share('toko_name', $toko->name ?? 'Toko');
        View::share('toko_description', $toko->description ?? 'Toko');
    }
}
