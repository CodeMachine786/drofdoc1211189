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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','HomePageController@index');
Route::get('/login','LoginController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/***
 * User Route
 */

Route::get('/profile','ProfileController@index')->name('profile');
Route::POST('/profileDetail','ProfileController@userDeatail')->name('profileDetail');
Route::get('/info','ProfileController@info')->name('PersonalInfo');
Route::POST('/imageUpload','ProfileController@ImageUpload')->name('imageUpload');
Route::get('/list','ListingController@index')->name('Listing');

 /***
  * Admin Route
  */
Route::prefix('admin')->group(function(){
    Route::get('/dashboard','AdminController@dashboard')->name('Dashboard');
    Route::get('category','CategoryController@category')->name('Category');
});

Route::prefix('admin/category')->group(function(){
   Route::get('add','CategoryController@addCategory')->name('Add');
   Route::POST('create','CategoryController@create')->name('Create');
});