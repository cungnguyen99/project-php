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

//FRONT END
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::post('/search', 'App\Http\Controllers\HomeController@search');


//BACKEND
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');

//logout
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//login
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//films:
Route::get('/add-category-film','App\Http\Controllers\CategoryFilms@add_category_film');
Route::get('/edit-category-film/{id_film}','App\Http\Controllers\CategoryFilms@edit_category_film');
Route::get('/delete-category-film/{id_film}','App\Http\Controllers\CategoryFilms@delete_category_film');
Route::get('/all-category-films','App\Http\Controllers\CategoryFilms@all_category_films');
Route::get('/all-films','App\Http\Controllers\CategoryFilms@all_films');
Route::get('/cart/{user_id}','App\Http\Controllers\CategoryFilms@cart');
Route::get('/cancel-ticket/{id_ticket}/{id_chair}','App\Http\Controllers\CategoryFilms@cancel')->name('cancel');
Route::get('/actor/{name}','App\Http\Controllers\CategoryFilms@films_actor');


Route::post('/save-film','App\Http\Controllers\CategoryFilms@save_film');
Route::post('/update-film/{id_film}','App\Http\Controllers\CategoryFilms@update_film');


//Home
Route::get('/single-film/{id_film}','App\Http\Controllers\CategoryFilms@single_film');

//genres films:
Route::get('/add-genre-film','App\Http\Controllers\GenresFilm@add_genre_film');
Route::get('/edit-genre-film/{id_genre}','App\Http\Controllers\GenresFilm@edit_genre_film');
Route::get('/delete-genre-film/{id_genre}','App\Http\Controllers\GenresFilm@delete_genre_film');
Route::get('/all-genres-film','App\Http\Controllers\GenresFilm@all_genres_film');

Route::post('/save-genre','App\Http\Controllers\GenresFilm@save_genre');
Route::post('/update-genre/{id_genre}','App\Http\Controllers\GenresFilm@update_genre');

//manufacturer films:
Route::get('/add-manufacturer-film','App\Http\Controllers\Manufacturers@add_manufacturer_film');
Route::get('/edit-manufacturer-film/{id_manufacturer}','App\Http\Controllers\Manufacturers@edit_manufacturer_film');
Route::get('/delete-manufacturer-film/{id_manufacturer}','App\Http\Controllers\Manufacturers@delete_manufacturer_film');
Route::get('/all-manufacturers-film','App\Http\Controllers\Manufacturers@all_manufacturers_film');

Route::post('/save-manufacturer','App\Http\Controllers\Manufacturers@save_manufacturer');
Route::post('/update-manufacturer/{id_manufacturer}','App\Http\Controllers\Manufacturers@update_manufacturer');

//ticket
Route::get('/book-ticket/{id_film}','App\Http\Controllers\BookTicket@book_ticket');
Route::post('/showtime','App\Http\Controllers\BookTicket@getShowtime');

Route::get('show_chairs/{time_id}', 'App\Http\Controllers\BookTicket@show_chair')->name("show_chair");
Route::get('/payment', 'App\Http\Controllers\BookTicket@payment');
Route::post('/save-payment', 'App\Http\Controllers\BookTicket@save_payment');

Route::get('/payment-online', 'App\Http\Controllers\BookTicket@payment_online');
