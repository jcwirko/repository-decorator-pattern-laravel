<?php

namespace App\Providers;

use App\Cache\UserCache;
use App\Contracts\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $bindings = [
        UserRepositoryInterface::class => UserCache::class
    ];

    public function register()
    {

    }

    public function boot()
    {

    }
}
