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
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquent\CategoriesRepository;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Eloquent\SuggestRepository;
use App\Repositories\Interfaces\SuggestRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\FavoriteRepository;
use App\Repositories\Interfaces\FavoriteRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(SuggestRepositoryInterface::class, SuggestRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(FavoriteRepositoryInterface::class, FavoriteRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cate['catelist'] = Categories::all();
        view()->share($cate);
    }
}
