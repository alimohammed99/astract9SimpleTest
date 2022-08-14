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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/activate_user/{id}', 'AdminController@activate_user', 'activate_user');

route::get('/deactivate_user/{id}', 'AdminController@deactivate_user', 'deactivate_user');

route::get('/delete_user/{id}', 'AdminController@delete_user', 'delete_user');

route::post('/messages', 'HomeController@messages', 'messages');

route::get('/search_user_by_status', 'AdminController@search_user_by_status', 'search_user_by_status');
