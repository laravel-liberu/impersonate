<?php

namespace LaravelLiberu\Impersonate\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Impersonate
{
    public function handle($request, Closure $next)
    {
        if ($request->hasSession() && $request->session()->has('impersonating')) {
            $provider = Config::get('auth.guards.web.provider');
            $model = Config::get("auth.providers.{$provider}.model");
            $user = $model::find($request->session()->get('impersonating'));
            Auth::setUser($user);

            return $next($request);
        }

        return $next($request);
    }
}
