<?php

namespace App\Providers;

use App\Components\Recursive;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        $recusive = new Recursive(Category::all());
        $htmlOptionSearchHeader = $recusive->categoryRecursive($parentId = '');
        View::share('htmlOptionSearchHeader', $htmlOptionSearchHeader);
        Schema::defaultStringLength(191);
    }
}
