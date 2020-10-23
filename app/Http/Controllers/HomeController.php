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
        return view('pages.home')->with('genres',$genres_id)->with('manufacturers',$manufacturers_id);
    }
}
