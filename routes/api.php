<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::post('register', 'API\RegisterController@register');
Route::middleware('auth:api')->group( function () {
    Route::resource('products', 'API\ProductController');
});*/

/*Route::post('/users', \App\Http\Controllers\API\User\StoreController::class);

Route::get('/users/{id}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);
    if (!$user) return response('', 404);
    return $user;
});

Route::group(['prefix' => 'test'], function () {
    Route::get('/user/{id}/is-admin', function ($id) {
        $user = \App\Models\User::find($id);
        return $user->hasRole('admin');
    });
});*/

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
    Route::put('/books/{id}', \App\Http\Controllers\API\Book\UpdateController::class);

    //---Обновление данных автора, авторизация под  автором обязательна (можно обновлять только свои данные)
    Route::put('/authors/{id}', \App\Http\Controllers\API\Author\UpdateController::class);

    Route::get('/logout', \App\Http\Controllers\API\Auth\LogoutController::class);
});








