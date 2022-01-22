<?php

use App\Models\Category;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/','PostController@index')->name('posts.index');
Route::get('posts/{post}','PostController@single')->name('posts.single');
Route::post('/comments/send','CommentController@send')->name('comments.send');
Route::get('show/post/by/category/{category}','PostController@showByCategory')->name('show.post.by.category');
Route::get('show/post/by/tags/{tag}','PostController@showByTags')->name('show.post.by.tags');
Route::get('show/posts/by/date/{date}','PostController@showByDate')->name('show.posts.by.date');
