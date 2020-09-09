<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/documentation', function () {
    return view('documentation');
})->name('documentation');

Route::get('/tutorial', function () {
    return view('tutorial');
})->name('tutorial');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/plugins', 'PluginController@index')->name('plugins.index');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    Route::resource('linked_social_accounts', 'LinkedSocialAccountController');
    Route::get('users/export/{fileType}', 'UserController@export')->name('users.export');
    Route::get('products/export/{fileType}', 'ProductController@export')->name('products.export');
    Route::get('linked_social_accounts/export/{fileType}', 'LinkedSocialAccountController@export')->name('linked_social_accounts.export');
});
