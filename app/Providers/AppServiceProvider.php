<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if ($_ENV['APP_LOG_QUERY'] === true) {            
            if ($this->app->environment('local')) {
                \DB::listen(function($query) {
                    $dbLog = new \Monolog\Logger('Query');
                    $dbLog->pushHandler(new \Monolog\Handler\RotatingFileHandler(storage_path('logs/query.log'), 5, \Monolog\Logger::DEBUG));
                    $dbLog->info($query->sql, ['Bindings' => $query->bindings, 'Time' => $query->time]);
                });
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
