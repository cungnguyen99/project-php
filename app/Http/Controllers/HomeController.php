<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $genres_id=DB::table('tbl_genres')->orderby('ID','desc')->get();

        $manufacturers_id=DB::table('tbl_manufacturers')->orderby('ID','desc')->get();

        $films_1=DB::table('tbl_films')->where('MaTheLoai','6')->orderby('IDf','desc')->get();

        $films_2=DB::table('tbl_films')->where('MaTheLoai','2')->orderby('IDf','asc')->get();

        $films_3=DB::table('tbl_films')->where('MaTheLoai','1')->orderby('IDf','desc')->get();

        return view('pages.home')
               ->with('genres',$genres_id)
               ->with('manufacturers',$manufacturers_id)
               ->with('films_1',$films_1)
               ->with('films_2',$films_2)
               ->with('films_3',$films_3);
    }
}
