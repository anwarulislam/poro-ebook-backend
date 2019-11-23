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


Route::get('/books', "BookController@getBooks");
Route::get('/books/category/{cat_id}', "BookController@getBooksByCategory");
Route::get('/books/categories', "CategoryController@categories");



Route::get('/books/bookmarked/{user_id}', "BookMarkedController@getAllBookmarked");
Route::post('/books/bookmarked', "BookMarkedController@postBookMarked");

Route::get('/books/review/{user_id}', "BookReviewedController@getAllBookmarked");
Route::post('/books/review', "BookReviewedController@postReview");