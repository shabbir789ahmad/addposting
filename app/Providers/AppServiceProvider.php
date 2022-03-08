<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\City;
use App\Models\Category;
use View;
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
        Paginator::useBootstrap();
        View::composer('*', function($view)
        {
          
              $cities=City::latest()->take(4)->get();
              $categories=Category::latest()->take(4)->get();
            $view->with('cities', $cities)->with('categories',$categories);
        });
        
    }
}
