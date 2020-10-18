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

Route::get('/', 'MenusController@index')->name('/');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('menus', 'MenusController');
});

// signup
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.get');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
// logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::post('menus/search', 'MenusController@search')->name('menus.search');
Route::post('menus/add_kondate', 'MenusController@add_kondate')->name('menus.add_kondate');
Route::post('kondate/generate_kondate_list', 'KondateController@generate_kondate_list')->name('kondate.generate_kondate_list');
Route::post('kondate/save_kondate_list', 'KondateController@save_kondate_list')->name('kondate.save');