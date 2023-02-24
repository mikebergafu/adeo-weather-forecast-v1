<?php

namespace App\Providers;

use App\Models\Genre;
use App\Observers\GenreObserver;
use Illuminate\Support\ServiceProvider;

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
        Genre::observe(GenreObserver::class);
    }
}
