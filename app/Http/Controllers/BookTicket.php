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

    public function AuthLogin()
    {
        $id=Session::get('id');

        if($id){
            return Redirect::to('/cinema');
        }else{
            return Redirect::to('/admin')->send(); 
        }
    }
    
    public function book_ticket($id_film, Request $req)
    {
        $this->AuthLogin();
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

    public function payment()
    {
        $showtime=Session::get('showtime');
        $id=Session::get('id');
        $chair=Session::get('selectchair');
        $user=DB::table('tbl_admin')->where('id',$id)->first();
        $ticket=DB::table('tbl_chairs')->where('chairID',$chair)->first();
        $date=DB::table('tbl_showtimes')->where('showID',$showtime)->first();
        $filmTicket=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('showID',$showtime)->first();
        return view('pages.payment')->with('filmTicket',$filmTicket)->with('user',$user)->with('date',$date)->with('ticket',$ticket);
    }

    public function save_payment(Request $req)
    {
        $id=Session::get('id');
        Session::put('showtime',$req->showtime);
        Session::put('selectchair',$req->selectchair);
        $data=array();
        $data['MaShow']=$req->showtime;
        $data['MaGhe']=$req->selectchair;
        $data['GiaVe']=5;
        $data['MaKH']=$id;
        DB::table('tbl_tickets')->insert($data);
        return Redirect::to('/payment'); 
    }
}
