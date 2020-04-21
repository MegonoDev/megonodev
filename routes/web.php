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
    return view('frontend.index');
})->name('megonodev');


Auth::routes(['register' => false, 'password.request' => false]); //disable karena mau custom login
Route::get('/login', function () {
    return view('errors.404');
});
Route::post('/login', function () {
    return view('errors.404');
});
Route::get('/logout', function () {
    return view('errors.404');
});

Route::get('/admin', function () {
    return redirect('/admin/home');
});
Route::post('/login', function () {
    return view('errors.404');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/admin/login', 'LoginController@login');
    Route::post('/admin/logout', 'LoginController@logout')->name('logout');
});


Route::group(['namespace' => 'b', 'prefix' => 'admin'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('akun', 'AkunController');
});



Route::group(['namespace' => 'f',], function () {
    Route::get('profile', 'FrontendController@profile')->name('frontend.profile');
    Route::get('team', 'FrontendController@team')->name('frontend.team');
    Route::get('portfolio', 'FrontendController@portfolio')->name('frontend.portfolio');
});
