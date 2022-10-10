<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('login'));

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.login');

Route::group(['middleware' => ['auth', 'role:admin']], function() {

    Route::get('/', fn () => to_route('dashboard'))->name('home');

    Route::get('/dashboard', \App\Http\Controllers\Dashboard\IndexController::class)->name('dashboard');

    Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');

    Route::name('admins.')->group(function () {
        Route::get('/admins', \App\Http\Controllers\Admin\IndexController::class)->name('index');
        Route::get('/admins/{admin}/show', \App\Http\Controllers\Admin\ShowController::class)->name('show');
        Route::get('/admins/{admin}/edit', \App\Http\Controllers\Admin\EditController::class)->name('edit');
        Route::get('/admins/create', \App\Http\Controllers\Admin\CreateController::class)->name('create');
        Route::post('/admins', \App\Http\Controllers\Admin\StoreController::class)->name('store');
        Route::patch('/admins/{admin}', \App\Http\Controllers\Admin\UpdateController::class)->name('update');
        Route::delete('/admins/{admin}', \App\Http\Controllers\Admin\DeleteController::class)->name('delete');
    });

    Route::name('books.')->group(function () {
        Route::get('/books', \App\Http\Controllers\Book\IndexController::class)->name('index');
        Route::get('/books/{book}/show', \App\Http\Controllers\Book\ShowController::class)->name('show');
        Route::get('/books/{book}/edit', \App\Http\Controllers\Book\EditController::class)->name('edit');
        Route::get('/books/create', \App\Http\Controllers\Book\CreateController::class)->name('create');
        Route::post('/books', \App\Http\Controllers\Book\StoreController::class)->name('store');
        Route::patch('/books/{book}', \App\Http\Controllers\Book\UpdateController::class)->name('update');
        Route::delete('/books/{book}', \App\Http\Controllers\Book\DeleteController::class)->name('delete');
    });

    Route::name('authors.')->group(function () {
        Route::get('/authors', \App\Http\Controllers\Author\IndexController::class)->name('index');
        Route::get('/authors/{author}/show', \App\Http\Controllers\Author\ShowController::class)->name('show');
        Route::get('/authors/{author}/edit', \App\Http\Controllers\Author\EditController::class)->name('edit');
        Route::get('/authors/create', \App\Http\Controllers\Author\CreateController::class)->name('create');
        Route::post('/authors', \App\Http\Controllers\Author\StoreController::class)->name('store');
        Route::patch('/authors/{author}', \App\Http\Controllers\Author\UpdateController::class)->name('update');
        Route::delete('/authors/{author}', \App\Http\Controllers\Author\DeleteController::class)->name('delete');
    });

    Route::name('genres.')->group(function () {
        Route::get('/genres', \App\Http\Controllers\Genre\IndexController::class)->name('index');
        Route::get('/genres/{genre}/show', \App\Http\Controllers\Genre\ShowController::class)->name('show');
        Route::get('/genres/{genre}/edit', \App\Http\Controllers\Genre\EditController::class)->name('edit');
        Route::get('/genres/create', \App\Http\Controllers\Genre\CreateController::class)->name('create');
        Route::post('/genres', \App\Http\Controllers\Genre\StoreController::class)->name('store');
        Route::patch('/genres/{genre}', \App\Http\Controllers\Genre\UpdateController::class)->name('update');
        Route::delete('/genres/{genre}', \App\Http\Controllers\Genre\DeleteController::class)->name('delete');
    });
});
