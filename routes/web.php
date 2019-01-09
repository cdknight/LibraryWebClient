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


// user account routes (viewable)

Route::get('/user/info', "UserAccountController@info")->middleware('auth');
Route::get('/user/requests', "UserAccountController@requests")->middleware('auth');
Route::get('/user/items_out', "UserAccountController@itemsOut")->middleware('auth');




// Search routes

Route::get('/search/quick', "SearchController@quickSearch");

// Book information routes

Route::get("/book/info/{id}", "BookInformationController@bookPage");


// USER ROUTES

// json routes to update information and such (for use with javascript)

/* Route to update user information
*
* Takes: user_id : ID of user that will be used to retrieve and update the user
* Takes: field_to_update: column that will be updated
* Takes: new_value: new value for that column
*
* Returns: JSON : { "status": boolean, "msg": string }
*
* TODO update the middleware to allow for user auth parameters
*/

Route::put('/user/update_info', "UserAccountController@updateInfo")->middleware('auth');





// REQUEST ROUTES


/* Route to delete requetst
*
* Takes: request_id : ID of request that will be used to retrieve and update the user
*
* Returns: JSON : { "status": boolean, "msg": string }
*
*/

Route::delete('/requests/delete', "RequestsController@deleteRequest")->middleware('auth');

/* Route to create a request
 *
 * Takes: bookid: ID of book part of request
 * Takes: userid: ID of user part of request
 *
*/


Route::put('/requests/create', "RequestsController@createRequest")->middleware('auth');



// ITEMS OUT ROUTES


/* Route to renew an item out
*
* Takes: item_out_id : ID of item out that will be used to renew itself.
*
* Returns: JSON : { "status": boolean, "msg": string }
*
*/

Route::put('/items_out/renew', "ItemsOutController@renewItemOut")->middleware('auth');



