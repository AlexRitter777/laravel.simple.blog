<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use App\View\Composers\SideBarComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.menu', MenuComposer::class);
        Facades\View::composer('layouts.sidebar', SideBarComposer::class);


        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
