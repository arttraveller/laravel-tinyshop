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

Route::get('/', 'Frontend\SiteController@index')->name('main');


// Access only for logged in users
Route::group(
    [
        'middleware' => ['auth', 'verified'],
    ],
    function () {
        Route::get('/home', 'Frontend\SiteController@home');
    }
);


// Access only for admins
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Backend',
        'middleware' => ['auth', 'verified', 'can:admin-access'],
    ],
    function () {
        Route::get('/', 'ControlController@dashboard')->name('cp_main');
        Route::resource('users', 'UsersController');
        Route::resource('brands', 'BrandsController');
        Route::resource('tags', 'TagsController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('characteristics', 'CharacteristicsController');
        Route::resource('products', 'ProductsController');
    }
);