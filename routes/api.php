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

Route::get('/books', \App\Http\Controllers\API\Book\IndexController::class);
Route::post('/users', \App\Http\Controllers\API\User\StoreController::class);

Route::get('/users/{id}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);
    if (!$user) return response('', 404);
    return $user;
});

/*---For Test---*/
Route::group(['prefix' => 'test'], function () {
    Route::get('/user/{id}/is-admin', function ($id) {
        $user = \App\Models\User::find($id);
        return $user->hasRole('admin');
    });
});

Route::group(['middleware' => ['auth:api', 'role:author']], function() {
    Route::get('/', \App\Http\Controllers\Dashboard\IndexController::class);

    Route::get('/logout', \App\Http\Controllers\API\Auth\Logout\IndexController::class);

    Route::delete('/books/{id}', \App\Http\Controllers\API\Book\DeleteController::class);
    Route::put('/books/{id}', \App\Http\Controllers\API\Book\UpdateController::class);
});


Route::get('/registration', \App\Http\Controllers\API\Auth\Registration\IndexController::class);
Route::post('/registration', \App\Http\Controllers\API\Auth\Registration\StoreController::class);

Route::get('/login', \App\Http\Controllers\API\Auth\Login\IndexController::class);
Route::post('/login', \App\Http\Controllers\API\Auth\Login\LoginController::class);

Route::get('/books', \App\Http\Controllers\API\Book\IndexController::class);
Route::get('/books/{id}', \App\Http\Controllers\API\Book\ShowController::class);

//---Получение списка авторов с указанием количества книг, авторизация не обязательна
Route::get('/authors', \App\Http\Controllers\API\Author\IndexController::class);




