<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::get('user', 'PassportController@returnUser')->middleware('auth:api');


Route::get('/books', "BookController@getBooks");
Route::get('/books/categories/{type}', "CategoryController@categories");
Route::get('/books/{book_id}', "BookController@getBook");
Route::get('/books/category/{cat_id}', "BookController@getBooksByCategory");

Route::get('/stores/{type}', "StoreController@getBooks");
Route::get('/stores/dokan/{cat_id}', "StoreController@getBooksByCategory");
Route::post('/stores', "StoreController@createBook");
// Route::get('/books/categories', "CategoryController@categories");
// Route::get('/books/{book_id}', "BookController@getBook");
// Route::get('/books/category/{cat_id}', "BookController@getBooksByCategory");



Route::get('/books/bookmarked/{user_id}', "BookmarkController@getAllBookmarks");
Route::post('/books/bookmarked', "BookmarkController@postBookmark");

Route::get('/books/review/{user_id}', "BookReviewedController@getAllBookmarks");
Route::post('/books/review', "BookReviewedController@postReview");
