<?php

use Illuminate\Support\Facades\Redis;

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

Route::get('/hamming-distance', "Challenge2Controller@index");

Route::group(['prefix' => '/github'], function($router){
    $router->get('/list', "GithubController@allList")->middleware('auth');
    $router->get('/{username}', "GithubController@getUser");
    $router->post('/registration', "GithubController@register");
    $router->post('/login', "GithubController@login");
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
