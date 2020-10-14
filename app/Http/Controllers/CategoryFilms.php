<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryFilms extends Controller
{
    public function add_category_film()
    {
        return view('admin.create_film');
    }

    public function all_category_films()
    {
        return view('admin.all_films');
    }
}
