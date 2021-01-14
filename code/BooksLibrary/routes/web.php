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

//homepage route
Route::get('/', function () {
    return view('Home');
});




//add book routes
Route::post('/books/add','BooksController@store');

//edit & update book routes
Route::patch('/books/update/{book}','BooksController@update');
Route::get('/books/update/{book}','BooksController@edit');

//delete book routes
Route::delete('/books/delete/{book}','BooksController@destroy');

//routes for book library
Route::get('/books/sort/{column}/{sorttype}','BooksController@sortBookList');
Route::get('/books/search','SearchController@search');

//routes for downloading
Route::get('/books/download/csv/{column}','DownloadsController@download');

//routes for book features
Route::resource('books','BooksController');