<?php

namespace Nonoco\Base;

use Illuminate\Support\ServiceProvider;
//use Nonoco\Base\Commands\Install;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
//        if ($this->app->runningInConsole()) {
//            $this->commands([Install::class]);
//        }
    }
}