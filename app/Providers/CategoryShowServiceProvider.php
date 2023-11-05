<?php

namespace App\Providers;

use App\Models\Backend\Category;
use Illuminate\Support\ServiceProvider;

class CategoryShowServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view){
            $common_categories = Category::select('id', 'title', 'slug', 'image')->get();
            $view->with('common_categories', $common_categories);
        });
    }
}
