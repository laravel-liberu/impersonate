<?php

namespace LaravelLiberu\Impersonate;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\DynamicMethods\Services\Methods;
use LaravelLiberu\Impersonate\DynamicMethods\IsImpersonationg;
use LaravelLiberu\Impersonate\Http\Middleware\Impersonate;
use LaravelLiberu\Users\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['router']->aliasMiddleware('impersonate', Impersonate::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        Methods::bind(User::class, [IsImpersonationg::class]);
    }
}
