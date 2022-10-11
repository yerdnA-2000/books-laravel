<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//---Регистрация пользователя
Route::post('/registration', \App\Http\Controllers\API\Auth\RegisterController::class);

//---Запрос на авторизацию пользователя
Route::post('/login', \App\Http\Controllers\API\Auth\LoginController::class);

//---Получение списка книг с именем автора, авторизация не обязательна
Route::get('/books', \App\Http\Controllers\API\Book\IndexController::class);

//---Получение данных книги по id, авторизация не обязательна
Route::get('/books/{id}', \App\Http\Controllers\API\Book\ShowController::class);

//---Получение списка авторов с указанием количества книг, авторизация не обязательна
Route::get('/authors', \App\Http\Controllers\API\Author\IndexController::class);

//---Получение данных автора со списком книг, авторизация не обязательна
Route::get('/authors/{id}', \App\Http\Controllers\API\Author\ShowController::class);

Route::group(['middleware' => ['auth:api', 'role:author']], function() {

    //---Удаление книги, авторизация под автором книги обязательна
    Route::delete('/books/{id}', \App\Http\Controllers\API\Book\DeleteController::class);

    //---Обновление данных книги, авторизация под автором книги обязательна
    Route::patch('/books/{id}', \App\Http\Controllers\API\Book\UpdateController::class);

    //---Обновление данных автора, авторизация под  автором обязательна (можно обновлять только свои данные)
    Route::patch('/authors/{id}', \App\Http\Controllers\API\Author\UpdateController::class);

    Route::get('/logout', \App\Http\Controllers\API\Auth\LogoutController::class);
});








