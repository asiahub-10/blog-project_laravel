<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Category;

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
        Schema::defaultStringLength('191');

        //*********** for all view files *********
        View::share('name', 'rohim');
        //**or**
        view::composer('*', function ($view) {
            $view->name = 'rohim';
        });

        //*********** for single view file *********
        view::composer('admin.category.add-category', function ($view) {
            $view->name = 'Rohim';
        });

        //*********** for multiple view files *********
        view::composer(['admin.category.add-category', 'admin.blog.manage-blog'], function ($view) {
            $view->name = 'Rohim';
        });


        view::composer(['front.*'], function ($view) {
            $view->categories  =  Category::where('publication_status', 1)->get();
        });
    }
}













