<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransportController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::middleware('auth')
    ->group(function () {
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
    });
