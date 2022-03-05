<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class HeaderCatalogeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $cataloge = Category::all();
        $this->menuItem = $cataloge;

        view()->composer('layouts.guest.header', function ($view){
            $view->with(['contents' => $this->menuItem]);
        });
    }
}
