<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('login'))->name('home');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');

Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('/', fn () => to_route('dashboard'))->name('home');

    Route::get('/dashboard', \App\Http\Controllers\Dashboard\IndexController::class)->name('dashboard');

    Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');

    Route::name('users.')->group(function () {
        Route::get('/users', \App\Http\Controllers\User\IndexController::class)->name('index');
        Route::get('/users/{id}/show', \App\Http\Controllers\User\ShowController::class)->name('show');
        Route::get('/users/{id}/edit', \App\Http\Controllers\User\EditController::class)->name('edit');
        Route::get('/users/create', \App\Http\Controllers\User\CreateController::class)->name('create');
        Route::post('/users', \App\Http\Controllers\User\StoreController::class)->name('store');
        Route::put('/users/{id}', \App\Http\Controllers\User\UpdateController::class)->name('update');
        Route::delete('/users/{id}', \App\Http\Controllers\User\DeleteController::class)->name('delete');
    });

    Route::name('books.')->group(function () {
        Route::get('/books', \App\Http\Controllers\Book\IndexController::class)->name('index');
        Route::get('/books/{id}/show', \App\Http\Controllers\Book\ShowController::class)->name('show');
        Route::get('/books/{id}/edit', \App\Http\Controllers\Book\EditController::class)->name('edit');
        Route::get('/books/create', \App\Http\Controllers\Book\CreateController::class)->name('create');
        Route::post('/books', \App\Http\Controllers\Book\StoreController::class)->name('store');
        Route::put('/books/{id}', \App\Http\Controllers\Book\UpdateController::class)->name('update');
        Route::delete('/books/{id}', \App\Http\Controllers\Book\DeleteController::class)->name('delete');
    });

    Route::name('authors.')->group(function () {
        Route::get('/authors', \App\Http\Controllers\Author\IndexController::class)->name('index');
        Route::get('/authors/{id}/show', \App\Http\Controllers\Author\ShowController::class)->name('show');
        Route::get('/authors/{id}/edit', \App\Http\Controllers\Author\EditController::class)->name('edit');
        Route::get('/authors/create', \App\Http\Controllers\Author\CreateController::class)->name('create');
        Route::post('/authors', \App\Http\Controllers\Author\StoreController::class)->name('store');
        Route::put('/authors/{id}', \App\Http\Controllers\Author\UpdateController::class)->name('update');
        Route::delete('/authors/{id}', \App\Http\Controllers\Author\DeleteController::class)->name('delete');
    });

    Route::name('genres.')->group(function () {
        Route::get('/genres', \App\Http\Controllers\Genre\IndexController::class)->name('index');
        Route::get('/genres/{id}/show', \App\Http\Controllers\Genre\ShowController::class)->name('show');
        Route::get('/genres/{id}/edit', \App\Http\Controllers\Genre\EditController::class)->name('edit');
        Route::get('/genres/create', \App\Http\Controllers\Genre\CreateController::class)->name('create');
        Route::post('/genres', \App\Http\Controllers\Genre\StoreController::class)->name('store');
        Route::put('/genres/{id}', \App\Http\Controllers\Genre\UpdateController::class)->name('update');
        Route::delete('/genres/{id}', \App\Http\Controllers\Genre\DeleteController::class)->name('delete');
    });
});
