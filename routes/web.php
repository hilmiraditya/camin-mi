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
    return view('admin.login');
});



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'karyawan'], function () {
  Route::get('/login', 'KaryawanAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'KaryawanAuth\LoginController@login');
  Route::post('/logout', 'KaryawanAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'KaryawanAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'KaryawanAuth\RegisterController@register');

  Route::post('/password/email', 'KaryawanAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'KaryawanAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'KaryawanAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'KaryawanAuth\ResetPasswordController@showResetForm');
});
