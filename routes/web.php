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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', \App\Http\Controllers\Book\IndexController::class);

Route::get('/users', \App\Http\Controllers\User\IndexController::class);

Route::get('/login', \App\Http\Controllers\Auth\Login\IndexController::class)->name('login');

Route::post('/login', \App\Http\Controllers\Auth\Login\AttemptController::class)->name('login.attempt');

Route::get('/logout', \App\Http\Controllers\Auth\Logout\IndexController::class)->name('logout');



Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/', \App\Http\Controllers\Dashboard\IndexController::class)->name('home');
    Route::get('/dashboard', \App\Http\Controllers\Dashboard\IndexController::class)->name('dashboard');
});
