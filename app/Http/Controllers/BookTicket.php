<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class chairsTable{
    public $id;
    public $chair_des;
    public $type;
}
class BookTicket extends Controller
{
    
    public function book_ticket($id_film, Request $req)
    {

        $film=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('IDf',$id_film)->first();

        $show_times=DB::table('tbl_showtimes')->where('MaPhim',$id_film)->get();

        if($film===null){

            Session::put('mess','Phim chưa có lịch chiếu.');
            return view('pages.book_ticket');

        }else{
            return view('pages.book_ticket')
               ->with('film',$film)
               ->with('showTimes',$show_times);
        }

    }

    public function show_chair($time_id)
    {
       try{
            $chair = DB::table('tbl_chairs')->get();
            $array = array();
            foreach($chair as $item){
                $ticker = DB::table('tbl_tickets')->where('MaShow', '=', $time_id)
                                        ->where('MaGhe', '=', $item->chairID)
                                        ->get();
                
                $chairs = new chairsTable;
                $chairs->id = $item->chairID;
                $chairs->chair_des = $item->tenGhe;

                if(count($ticker) > 0){
                    $chairs->type = true;
                }
                else{
                    $chairs->type = false;
                }

                $array[] = $chairs;
            }
            return response()->json($array);
       }
       catch(Exception $ex){
           return response()->json("Error");
       }
    }
}
