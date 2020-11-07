<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BookTicket extends Controller
{
    
    public function book_ticket($id_film, Request $req)
    {
        // $showid=$req->showtime;

        $film=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('IDf',$id_film)->first();

        $chairs=DB::table('tbl_chairs')->get();

        $chair_ticket=DB::table('tbl_tickets')
        ->join('tbl_showtimes','tbl_showtimes.showID','=','tbl_chairs.MaShow')->get();

        $show_times=DB::table('tbl_showtimes')->where('MaPhim',$id_film)->get();

        // $show_time=DB::table('tbl_showtimes')->where('showID',$showid)->first();

        return view('pages.book_ticket')
               ->with('film',$film)
               ->with('showTimes',$show_times);
            //    ->with('time',$show_time);

    }
}
