<?php

use Illuminate\Support\Facades\Route;

Route::get('','AdminController@index');
Route::resource('posts','PostController')->except(['show']);
Route::resource('categories','CategoryController')->except(['show']);
Route::resource('tags','TagController')->except(['show']);
Route::resource('comments','CommentController')->except(['show','create','store']);
Route::patch('comments/approved/{comment}','CommentController@approved')->name('comments.approved');
Route::patch('comments/disApproved/{comment}','CommentController@disApproved')->name('comments.disApproved');
