<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\ServiceProvider;
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
        View::composer('client.header.header', function ($view){
            $view->with('categories', Category::all());
            $view->with('brands', Brand::all());
        });

        View::composer('client.footer.footer', function ($view){
            $view->with('products', Product::take(5)->orderBy('id','desc')->get());
            $view->with('bestProducts', Product::take(5)->orderBy('popularity','desc')->get());
        });
    }
}
