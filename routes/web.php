<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use App\Post;


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

Route::get('/', 'HomeController@index')->name('index');

//Post Guest
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');

Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');
});
