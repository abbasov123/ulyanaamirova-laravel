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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", "BlogsController@index")->name("main.index")->name("home");
//Route::get("/", "BlogsController@test1")->name("home");

Route::get("/about", "AboutsController@about")->name("main.about");


Route::get("/admin", "AboutsController@admin")->name("main.admin")->middleware("auth");

Route::get("/about/edit", "AboutsController@edit_about")->name("about.edit")->middleware("auth");
Route::post("/about/edit", "AboutsController@save_about")->name("about.save")->middleware("auth");

Route::post("/delete", "AboutsController@delete")->middleware("auth");





Route::get("/write", "BlogsController@write")->name("blogs.write")->middleware("auth");
//Route::post("/write", "BlogsController@test");
Route::post("/write", "BlogsController@publish")->name("blogs.publish")->middleware("auth");



Route::get("/publish", "BooksController@write")->name("books.write")->middleware("auth");
Route::post("/publish", "BooksController@publish")->name("books.publish")->middleware("auth");


Auth::routes([
    // "register" => false
]);

Route::get("/books", "BooksController@books")->name("main.books");
Route::get("/books/{id}", "BooksController@read")->name("books.read");
Route::delete("/books/{id}", "BooksController@delete")->name("books.delete");

Route::get('/home', 'BlogsController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');


Route::get("/blogs", "BlogsController@blogs")->name("main.blogs"); //I'll remove it in the future


Route::get("/{id}", "BlogsController@read")->name("blogs.read");
Route::delete("/{id}", "BlogsController@delete")->name("blogs.delete");
