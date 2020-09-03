<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Favorite;
use App\Models\Product;
use App\User;
use Session;
use Auth;
use DB;
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

    }
}
