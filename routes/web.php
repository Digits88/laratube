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
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'],function(){
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('/login', 'AdminController@create')->name('admin.create');
    Route::post('/login', 'AdminController@login')->name('admin.login');


    Route::get('/categories', 'CategoryController@index_main')->name('index.main');
    Route::get('/categories/create', 'CategoryController@create_main')->name('create.main');
    Route::post('/categories/store', 'CategoryController@main_store')->name('main.store');

    Route::get('/categories/create/sub', 'CategoryController@create_sub')->name('create.sub');
    Route::post('/categories/store/sub', 'CategoryController@sub_store')->name('sub.store');
});

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
