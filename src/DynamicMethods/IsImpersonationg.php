<?php

namespace LaravelLiberu\Impersonate\DynamicMethods;

use Closure;
use Illuminate\Support\Facades\Session;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class IsImpersonationg implements Method
{
    public function name(): string
    {
        return 'isImpersonating';
    }

    public function closure(): Closure
    {
        return fn () => Session::has('impersonating');
    }
}
