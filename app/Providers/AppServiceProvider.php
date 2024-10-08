<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::morphMap([
            'classified' => 'App\Models\Classified',
            'service' => 'App\Models\Service',
            'jobs' => 'App\Models\Job',
            'explore' => 'App\Models\Explore',


        ]);
    }
}
