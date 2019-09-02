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
    return redirect('home');
});

// Regular Routes
Route::resource('book', 'BookController');
Route::resource('loan', 'LoanController');

// Admin Routes
Route::resource('author', 'AuthorController');
Route::resource('category', 'CategoryController');
Route::resource('user', 'UserController');
Route::resource('location', 'LocationController');
Route::resource('copy', 'CopyController');
Route::resource('role', 'RoleController');
Route::resource('status', 'StatusController');
Route::put('Loans/{id}/handin', 'LoanController@handin')->name('loan.handin');

Auth::routes();

// Index-only Routes
Route::get('/home', 'HomeController@index');
Route::get('/help', 'HelpController@index');

// Update Avatar
Route::get('/avatar', function () {
    return view('avatar');
});

Route::post('/avatar', 'UserController@update_avatar');

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});
