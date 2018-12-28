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

Route::get('/', 'HomeController@show');


// authentication routes

Route::get('/login', "Authentication\LoginController@show");
Route::post('/login', "Authentication\LoginController@doLogin");

Route::get('/logout', "Authentication\LogoutController@doLogout");


// user account routes

Route::get('/user/dashboard', "UserAccountController@dashboard")->middleware('auth');
Route::get('/user/requests', "UserAccountController@requests")->middleware('auth');