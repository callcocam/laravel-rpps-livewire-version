<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('login', \App\Modules\Admin\App\Http\Livewire\Auth\Login::class)
    ->name('login');


Route::get('password/forgot', \App\Modules\Admin\App\Http\Livewire\Auth\Password\Forgot::class)
    ->name('password.forgot');


Route::get('reset/password/{token}', \App\Modules\Admin\App\Http\Livewire\Auth\Password\Reset::class)
    ->name('password.reset');
