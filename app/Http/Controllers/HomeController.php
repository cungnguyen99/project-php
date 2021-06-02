<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use DateTime;
use Illuminate\Support\Facades\Redirect;
session_start();
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        $genres_id=DB::table('tbl_genres')->orderby('ID','desc')->get();

        $manufacturers_id=DB::table('tbl_manufacturers')->orderby('ID','desc')->get();

        $films_1=DB::table('tbl_films')->where('MaTheLoai','3')->orderby('IDf','desc')->get();

        $films_2=DB::table('tbl_films')->where('MaTheLoai','2')->orderby('IDf','asc')->get();

        $films_3=DB::table('tbl_films')->where('MaTheLoai','1')->orderby('IDf','desc')->get();

        $films_4=DB::table('tbl_films')->where('MaHSX','2')->orderby('IDf','desc')->get();//marvel

        $films_5=DB::table('tbl_films')->where('MaHSX','3')->orderby('IDf','desc')->get();//bros

        $films_6=DB::table('tbl_films')->where('MaHSX','1')->orderby('IDf','asc')->get();//disney

        $films_7=DB::table('tbl_films')->select('DaoDien', DB::raw('count(*) as total'))->groupBy('DaoDien')->get();

        return view('pages.home')
               ->with('genres',$genres_id)
               ->with('manufacturers',$manufacturers_id)
               ->with('films_1',$films_1)
               ->with('films_2',$films_2)
               ->with('films_3',$films_3)
               ->with('films_4',$films_4)
               ->with('films_5',$films_5)
               ->with('films_7',$films_7)
               ->with('films_6',$films_6);
    }

    public function search(Request $req)
    {
        $keyword=$req->keyword;
        $time=$req->time;
        $dates=$req->date;
        // $t= (new DateTime($date))->format('H');
        $d=(new DateTime($dates))->format('d-m-Y');
        // $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        // $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $films=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('tbl_showtimes.NgayChieu','like','%'.$d.'%')
        ->groupBy('MaPhim')
        ->get();
        // $films=DB::table('tbl_films')->where('TenPhim','like','%'.$keyword.'%')->get();
        // $films=DB::table('tbl_films')->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')->where('GioChieu','like',$keyword.'%')->get();
        // $films=DB::table('tbl_films')->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')->whereDate('NgayKhoiChieu','>=',date($weekStartDate))->whereDate('NgayKetThuc','<=', date($weekEndDate))->where('GioBatDau','<=',(int)$keyword[0])->where('GioKetThuc','>=',(int)$keyword[0])->get();
        
        if(count($films)==0){
            
            Session::put('mess','Không tìm thấy phim với từ khóa đã cho.');
            return view('pages.search')->with('films',$films);
            
        }else{
            Session::put('date',$dates);
            return view('pages.search')->with('films',$films);
        }
    }
}
