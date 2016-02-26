<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $user = \App\User::where('name', 'admin')->get();
    if (count($user) == 0) {
        \App\User::create([
            'name' => 'admin',
            'email' => 'sosek108@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('1fqra4'),
        ]);
    }
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('sessions', 'SessionsController');
    Route::get('login', ['as' => 'login', 'uses' =>'SessionsController@create']);
    Route::get('logout', 'SessionsController@destroy');


    Route::group(['as' => 'admin::', 'prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/', ['as' => 'index', function() {
            return \Illuminate\Support\Facades\Redirect::route('admin::dashboard');
        }]);

        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    });
});

