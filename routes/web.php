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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/posts', 'PostsController@store');
Route::get('/posts', 'PostsController@index');
Route::patch('/posts/{post}', 'PostsController@update');



Route::post('/books', 'BooksController@store');
Route::get('/books', 'BooksController@index');
Route::patch('/books/{book}', 'BooksController@update');
Route::delete('/books/{book}', 'BooksController@destroy');

Route::resource('/authors', 'AuthorsController');


Route::post('/projects', 'ProjectsController@store');
Route::get('/projects', 'ProjectsController@index');
Route::patch('/projects/{project}', 'ProjectsController@update');

//Auth::routes();

Route::get('register/', 'AuthorizeController@registerForm');
Route::get('login/', 'AuthorizeController@loginForm');
Route::post('register/', 'AuthorizeController@register');
Route::get('/home', 'HomeController@index')->name('home');


















