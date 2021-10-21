<?php

namespace App\Providers;

use App\Models\Events;
use App\Observers\RecurrenceObserver;
use DB;
use Illuminate\Support\Facades\Config;
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
        if (Config::get('general.is_loggin_query') == 1) {
            DB::listen(function ($query) {
                echo "\n";
                echo "\n";
                echo $query->sql;

                echo "\n";
                echo '*********************************************************************';
                // $query->bindings
            // $query->time
            });
        }
    }
}
