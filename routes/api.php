<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Impersonate\Http\Controllers\Start;
use LaravelLiberu\Impersonate\Http\Controllers\Stop;

Route::middleware(['web', 'auth:web', 'core'])
    ->prefix('api/core/impersonate')->as('core.impersonate.')
    ->group(function () {
        Route::get('stop', Stop::class)->name('stop');
        Route::get('{user}', Start::class)->name('start');
    });
