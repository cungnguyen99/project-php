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
Route::get('/admin-signin','App\Http\Controllers\AdminController@index_signin');
Route::post('/save-sigin','App\Http\Controllers\AdminController@save_sigin');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard')->middleware('auth.roles');

//logout
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//login
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//films:
Route::get('/add-category-film','App\Http\Controllers\CategoryFilms@add_category_film')->middleware('auth.roles');
Route::get('/edit-category-film/{id_film}','App\Http\Controllers\CategoryFilms@edit_category_film')->middleware('auth.roles');
Route::get('/delete-category-film/{id_film}','App\Http\Controllers\CategoryFilms@delete_category_film')->middleware('auth.roles');
Route::get('/all-category-films','App\Http\Controllers\CategoryFilms@all_category_films')->middleware('auth.roles');
Route::get('/all-films','App\Http\Controllers\CategoryFilms@all_films');
Route::get('/cart/{user_id}','App\Http\Controllers\CategoryFilms@cart');
Route::get('/cancel-ticket/{order_id}','App\Http\Controllers\CategoryFilms@cancel')->name('cancel');
Route::get('/actor/{name}','App\Http\Controllers\CategoryFilms@films_actor');
Route::get('/revenue-films','App\Http\Controllers\CategoryFilms@revenue_films')->middleware('auth.roles');
Route::get('/revenue-month','App\Http\Controllers\CategoryFilms@revenue_month')->middleware('auth.roles');
Route::post('/export-excel','App\Http\Controllers\CategoryFilms@export_excel')->middleware('auth.roles');
Route::get('/payment-report','App\Http\Controllers\CategoryFilms@payment_report')->middleware('auth.roles');
Route::get('/manager-users','App\Http\Controllers\CategoryFilms@manager_users')->middleware('auth.roles');
Route::get('/delete-user/{id_user}','App\Http\Controllers\CategoryFilms@delete_user')->middleware('auth.roles');
Route::get('/unactive-user/{id_user}','App\Http\Controllers\CategoryFilms@unactive_user')->middleware('auth.roles');
Route::get('/active-user/{id_user}','App\Http\Controllers\CategoryFilms@active_user')->middleware('auth.roles');

Route::post('/save-film','App\Http\Controllers\CategoryFilms@save_film')->middleware('auth.roles');
Route::post('/update-film/{id_film}','App\Http\Controllers\CategoryFilms@update_film')->middleware('auth.roles');


//Home
Route::get('/single-film/{id_film}','App\Http\Controllers\CategoryFilms@single_film');

//genres films:
Route::get('/add-genre-film','App\Http\Controllers\GenresFilm@add_genre_film')->middleware('auth.roles');
Route::get('/edit-genre-film/{id_genre}','App\Http\Controllers\GenresFilm@edit_genre_film')->middleware('auth.roles');
Route::get('/delete-genre-film/{id_genre}','App\Http\Controllers\GenresFilm@delete_genre_film')->middleware('auth.roles');
Route::get('/all-genres-film','App\Http\Controllers\GenresFilm@all_genres_film')->middleware('auth.roles');

Route::post('/save-genre','App\Http\Controllers\GenresFilm@save_genre')->middleware('auth.roles');
Route::post('/update-genre/{id_genre}','App\Http\Controllers\GenresFilm@update_genre')->middleware('auth.roles');

//manufacturer films:
Route::get('/add-manufacturer-film','App\Http\Controllers\Manufacturers@add_manufacturer_film')->middleware('auth.roles');
Route::get('/edit-manufacturer-film/{id_manufacturer}','App\Http\Controllers\Manufacturers@edit_manufacturer_film')->middleware('auth.roles');
Route::get('/delete-manufacturer-film/{id_manufacturer}','App\Http\Controllers\Manufacturers@delete_manufacturer_film')->middleware('auth.roles');
Route::get('/all-manufacturers-film','App\Http\Controllers\Manufacturers@all_manufacturers_film')->middleware('auth.roles');

Route::post('/save-manufacturer','App\Http\Controllers\Manufacturers@save_manufacturer')->middleware('auth.roles');
Route::post('/update-manufacturer/{id_manufacturer}','App\Http\Controllers\Manufacturers@update_manufacturer')->middleware('auth.roles');

//ticket
Route::get('/book-ticket/{id_film}','App\Http\Controllers\BookTicket@book_ticket');
Route::post('/showtime','App\Http\Controllers\BookTicket@getShowtime');

Route::get('show_chairs/{time_id}', 'App\Http\Controllers\BookTicket@show_chair')->name("show_chair");
Route::get('/payment', 'App\Http\Controllers\BookTicket@payment');
Route::post('/save-payment', 'App\Http\Controllers\BookTicket@save_payment');
Route::get('/payment-online/{user_id}', 'App\Http\Controllers\BookTicket@payment_online');
Route::post('submit_vnpay', 'App\Http\Controllers\BookTicket@SubmitVnPay')->name('submit_vnpay');
Route::get('VnPayReturn', 'App\Http\Controllers\BookTicket@vnpayreturn')->name('vnpay_return');

Route::get('/add-showtime','App\Http\Controllers\Showtime@add_showtime_film')->middleware('auth.roles');
Route::get('/edit-showtime/{id_film}','App\Http\Controllers\Showtime@edit_showtime_film')->middleware('auth.roles');
Route::get('/delete-showtime/{id_film}','App\Http\Controllers\Showtime@delete_showtime_film')->middleware('auth.roles');
Route::get('/all-showtimes','App\Http\Controllers\Showtime@all_showtimes_film')->middleware('auth.roles');
Route::post('/save-showtime','App\Http\Controllers\Showtime@save_showtime')->middleware('auth.roles');
Route::post('/update-showtime/{id_showtime}','App\Http\Controllers\Showtime@update_showtime')->middleware('auth.roles');
