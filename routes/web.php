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

Route::get('/', 'HomeController@index');
Route::get('/categories/{category}/posts','CategoryController@posts')->name('category.posts');
Route::get('/posts/{post}','PostController@show')->name('post');
Auth::routes(['verify' => true]);
Route::get('/archive/posts/{month}/{year}','ArchiveController@getPosts')->name('archive.getPosts');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
