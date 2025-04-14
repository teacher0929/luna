<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
    });

Route::controller(PackageController::class)
    ->prefix('packages')
    ->name('packages.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
    });

Route::controller(TransportController::class)
    ->prefix('transports')
    ->name('transports.')
    ->group(function () {
        Route::get('', 'index')->name('index');
    });
