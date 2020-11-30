<?php

namespace App\Providers;
use App\Menu;

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
        $menuItem = Menu::where('menu_status','Active')->get();
        view()->share('menuItem', '$menuItem');
    }
}
