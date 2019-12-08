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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//For Admin
Route::group(['prefix' => 'admin'], function() {

    // Login Routes...
        Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);
        Route::post('login', ['uses' => 'AdminAuth\LoginController@login']);
        Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);
    
    // Registration Routes...
        Route::get('register', ['as' => 'admin.register', 'uses' => 'AdminAuth\RegisterController@showRegistrationForm']);
        Route::post('register', ['uses' => 'AdminAuth\RegisterController@register']);
    
    // Password Reset Routes...
        Route::get('password/reset', ['as' => 'admin.password.reset', 'uses' => 'AdminAuth\ForgotPasswordController@showLinkRequestForm']);
        Route::post('password/email', ['as' => 'admin.password.email', 'uses' => 'AdminAuth\ForgotPasswordController@sendResetLinkEmail']);
        Route::get('password/reset/{token}', ['as' => 'admin.password.reset.token', 'uses' => 'AdminAuth\ResetPasswordController@showResetForm']);
        Route::post('password/reset', ['uses' => 'AdminAuth\ResetPasswordController@reset']);
    });
    Route::view('/admin/home','admin-home')->middleware('admin');

//racks

//Route::get("/admin/racks", 'AdminRacks@show');
Route::get("/admin/racks", 'AdminRacks@show')->middleware('admin');

//Route::get("/client/racks", 'AdminRacks@show_client');
Route::get("/client/racks", 'AdminRacks@show_client')->middleware('client');

//Route::post("/admin/addracks", 'AdminRacks@store');
Route::post("/admin/addracks", 'AdminRacks@store')->middleware('admin');

//Route::get('/admin/removeracks/{id}', 'AdminRacks@destroy');
Route::get('/admin/removeracks/{id}', 'AdminRacks@destroy')->middleware('admin');


//books

Route::get("/admin/books", 'AdminBooks@show')->middleware('admin');
Route::post("/admin/addbooks", 'AdminBooks@store')->middleware('admin');
Route::get('/admin/removebooks/{id}', 'AdminBooks@destroy')->middleware('admin');
Route::view("/admin/books/error", 'rackerror')->middleware('admin');
Route::view("/admin/books/exceedserror", 'exceederror')->middleware('admin');

Route::get('/client/books/{id}', 'AdminBooks@showbooks_client')->middleware('client');
Route::post('/client/searchbooks', 'AdminBooks@search_books')->middleware('client');

// For Client
    Route::group(['prefix' => 'client'], function() {

        // Login Routes...
            Route::get('login', ['as' => 'client.login', 'uses' => 'ClientAuth\LoginController@showLoginForm']);
            Route::post('login', ['uses' => 'ClientAuth\LoginController@login']);
            Route::post('logout', ['as' => 'client.logout', 'uses' => 'ClientAuth\LoginController@logout']);
        
        // Registration Routes...
            Route::get('register', ['as' => 'client.register', 'uses' => 'ClientAuth\RegisterController@showRegistrationForm']);
            Route::post('register', ['uses' => 'ClientAuth\RegisterController@register']);
        
        // Password Reset Routes...
            Route::get('password/reset', ['as' => 'client.password.reset', 'uses' => 'ClientAuth\ForgotPasswordController@showLinkRequestForm']);
            Route::post('password/email', ['as' => 'client.password.email', 'uses' => 'ClientAuth\ForgotPasswordController@sendResetLinkEmail']);
            Route::get('password/reset/{token}', ['as' => 'client.password.reset.token', 'uses' => 'ClientAuth\ResetPasswordController@showResetForm']);
            Route::post('password/reset', ['uses' => 'ClientAuth\ResetPasswordController@reset']);
        });

        Route::view('/client/home','client-home')->middleware('client');

