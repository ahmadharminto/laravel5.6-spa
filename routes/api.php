<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    $router->post('register', 'AuthController@register')->name('auth.register');
    $router->post('login', 'AuthController@login')->name('auth.login');
    $router->post('logout', 'AuthController@logout')->name('auth.logout');
    $router->post('refresh', 'AuthController@refresh')->name('auth.refresh');
    $router->post('me', 'AuthController@me')->name('auth.me');
});

Route::apiResource('question', 'QuestionController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('question/{question}/reply', 'ReplyController');
Route::post('like/{reply}', 'LikeController@store')->name('like.store');
Route::delete('like/{reply}', 'LikeController@destroy')->name('like.destroy');