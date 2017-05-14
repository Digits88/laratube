<?php

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


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::get('register', [
    'uses'  =>  'UserController@create',
    'as'    =>  'user.create'
]);

Route::post('register',[
    'uses'  =>  'UserController@store',
    'as'    =>  'user.register'
]);

Route::post('login',[
    'uses'  =>  'UserController@login',
    'as'    =>  'user.login'
]);

Route::get('logout',[
    'uses'  =>  'UserController@logout',
    'as'    =>  'user.logout'
]);

Route::get('confirm/{id}/{hash}',[
    'uses'  =>  'UserController@confirmMail',
    'as'    =>  'user.confirm'
]);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'user', 'middleware' => 'user'],function(){
    Route::get('/dashboard', function(){
        echo "HELLO";
    })->name('user.dashboard');
});
