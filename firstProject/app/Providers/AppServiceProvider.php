<?php

namespace App\Providers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

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
        Debugbar::enable();

        $topUsers = Cache::remember('topUsers', 60*2, function () {
            return User::withCount("ideas")->orderBy("ideas_count","desc")->limit(2)->get();
        });

        Paginator::useBootstrapFive();
        view()->share('topUsers', $topUsers);
    }
}
