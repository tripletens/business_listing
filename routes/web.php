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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'BusinessController@index');

Route::prefix('business')->group(function () {
    Route::get('search', 'BusinessController@search')->name('view-search');
    Route::post('process-search', 'BusinessController@process_search')->name('process-search');
    Route::get('show/{id}', 'BusinessController@show')->name('show-business');
    Route::get('edit/{id}', 'BusinessController@edit')->name('edit-business');
    Route::post('update/{id}', 'BusinessController@update')->name('update-business');
    Route::post('deactivate/{id}', 'BusinessController@deactivate')->name('deactivate-business');
    Route::post('activate/{id}', 'BusinessController@activate')->name('activate-business');
    Route::post('delete/{id}', 'BusinessController@destroy')->name('delete-business');

    Route::get('view-count/{id}', 'BusinessController@view_count')->name('view-count');
});


// handles admin routes with prefix admin
Route::prefix('admin')->group(function () {
    Route::get('login','AdminController@login')->name('admin-login');
    Route::post('process-login', 'AdminController@process_login')->name('admin-process-login');
    Route::get('dashboard','AdminController@dashboard')->name('admin-dashboard');

    // business routes here
    Route::get('create-business', 'BusinessController@create')->name('admin-create-business');
    Route::post('process-business', 'BusinessController@store')->name('admin-process-business');
    Route::get('add-business-to-category', 'BusinessController@add_business_to_category')->name('admin-add-business-to-category');
    Route::post('process-add-business-to-category', 'BusinessController@process_add_business_to_category')->name('process-add-business-to-category');
    // category routes here
    Route::get('create-category', 'CategoryController@create')->name('admin-create-category');
    Route::post('process-category', 'CategoryController@store')->name('admin-process-category');
    Route::get('view-categories', 'CategoryController@index')->name('admin-view-categories');
});

Route::resource('admin', 'AdminController');
Route::resource('category', 'CategoryController');




Auth::routes();
