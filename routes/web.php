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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '@{username}', 'as' => 'user.'], function () {
    Route::get('', 'UserController@done')->name('done');
    Route::get('pending', 'UserController@pending')->name('pending');
    Route::get('products', 'UserController@products')->name('products');
    Route::get('following', 'UserController@following')->name('following');
    Route::get('followers', 'UserController@followers')->name('followers');
});

Route::group(['prefix' => 'settings', 'as' => 'user.settings.', 'middleware' => ['auth']], function () {
    Route::get('', 'UserController@profileSettings')->name('profile');
    Route::get('account', 'UserController@accountSettings')->name('account');
    Route::get('password', 'UserController@passwordSettings')->name('password');
    Route::get('delete', 'UserController@deleteSettings')->name('delete');
});

Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');

Route::group(['prefix' => 'product/{slug}', 'as' => 'product.'], function () {
    Route::get('', 'ProductController@done')->name('done');
    Route::get('pending', 'ProductController@pending')->name('pending');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('', 'ProductsController@newest')->name('newest');
    Route::get('launched', 'ProductsController@launched')->name('launched');
    Route::get('new', 'ProductsController@new')->name('new')->middleware('auth');
});

Route::group(['prefix' => 'questions', 'as' => 'questions.'], function () {
    Route::get('', 'QuestionController@newest')->name('newest');
    Route::get('unanswered', 'QuestionController@unanswered')->name('unanswered');
    Route::get('popular', 'QuestionController@popular')->name('popular');
    Route::get('new', 'QuestionController@new')->name('new')->middleware('auth');
});

// Toggles
Route::get('adminbar', 'Admin\AdminBarController@toggle')->name('adminbar')->middleware('auth');
Route::get('darkmode', 'UserController@darkMode')->name('darkmode')->middleware('auth');

Route::get('task/{id}', 'TaskController@task')->name('task');

Route::get('patron', 'PatronController@patron')->name('patron');

Route::personalDataExports('personal-data-exports');
