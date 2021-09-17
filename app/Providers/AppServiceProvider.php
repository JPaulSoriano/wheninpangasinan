<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Support\Facades\View;
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
        //
        $cat = [];
        $link = [];
        
        if(Schema::hasTable('categories')){
            $cat = Category::all();
        }
        if(Schema::hasTable('links')){
            $link = Link::all();
        }

        View::share('categories', $cat);
        View::share('links', $link);
    }
}
