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

Auth::routes(['verify' => true]);

Route::get('/', 'Frontend\SiteController@index')->name('main_page');
Route::get('/home', 'Frontend\SiteController@home')->name('home')->middleware('verified');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Backend',
        // TODO access only for admin
        'middleware' => ['auth', 'verified'],
    ],
    function () {
        Route::resource('users', 'UsersController');
    }
);