<?php

namespace LaravelLiberu\Impersonate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use LaravelLiberu\Users\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('impersonate', fn (User $user, User $targetUser) => $user
            ->can('access-route', 'core.impersonate.start')
            && ! $targetUser->isAdmin()
            && $user->id !== $targetUser->id
            && ! $user->isImpersonating());
    }
}
