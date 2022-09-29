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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', \App\Http\Controllers\API\Book\IndexController::class);
Route::post('/sign-up', \App\Http\Controllers\API\User\StoreController::class);

Route::get('/user/{id}', function (Request $request, $id) {
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

Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/dashboard', function() {
        return 'Добро пожаловать, Администратор';
    });
});
