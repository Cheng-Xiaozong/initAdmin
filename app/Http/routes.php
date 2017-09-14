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
Route::get('/', 'HomeController@index');
Route::any('/login', 'User\UserController@login');
Route::any('/register', 'User\UserController@register');
Route::post('/getElementByPid', 'Area\AreaInfoController@getElementByPid');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/home', 'HomeController@home');
    Route::get('/logout', 'User\UserController@logout');
});



