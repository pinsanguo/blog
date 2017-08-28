<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/now', function (){
    return date("Y-m-d H:i:s");
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('/index', 'IndexController@index');
    Route::get('/main', 'IndexController@main');
    Route::get('/datalist', 'IndexController@datalist');

    Route::resource('article', 'ArticleController');
    Route::resource('category', 'NavController');
});
