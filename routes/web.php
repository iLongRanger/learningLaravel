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
    return view('auth/login');
});

Auth::routes();

Route::get('/auth/login', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'] , function() {

    Route::get('/admin', function () {

        return view('admin.index');
    });


//routes for admin with middleware
    Route::group(['middleware' => 'admin'], function () {


        Route::resource('admin/users', 'AdminUsersController');
        Route::get('admin/users/index', function () {

            return view('admin.users.index');

        });
        Route::get('admin/users/edit/{id}', 'AdminUsersController@edit');
        Route::get('admin/users/delete/{id}', 'AdminUsersController@destroy');

    });

//routes for error

    Route::get('errors/503', function () {

        return view('errors.503');
    });

});
