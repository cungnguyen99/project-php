<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ShowTime extends Controller
{
    public function add_showtime_film()
    {
        $films_id=DB::table('tbl_films')->orderby('IDf','desc')->get();
        $rooms_id=DB::table('tbl_rooms')->orderby('roomID','desc')->get();
        return view('admin.create_showtime')->with('films', $films_id)->with('rooms', $rooms_id);
    }
    public function all_showtimes_film()
    {
        $all_showtimes=DB::table('tbl_showtimes')->join('tbl_films','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->get();
        $data=view('admin.all_showtimes')->with('allShowtimes',$all_showtimes);
        return view('admin_layout')->with('admin.all_showtimes',$data);
    }
    public function save_showtime(Request $req)
    {
        $data=array();
        $data['MaPhim']=$req->tenphim;
        $data['MaPhong']=$req->tenphong;
        $data['NgayChieu']=$req->ngaykc;
        $data['GioBatDau']=$req->gbd;
        $data['GioKetThuc']=$req->gkt;
        $data['GioChieu']=$req->gbd.'h-'.$req->gkt.'h';
        DB::table('tbl_showtimes')->insert($data);
        Session::put('message','Thêm lịch chiếu thành công.');
        return Redirect::to('all-showtimes');
    }
    public function edit_showtime_film($id_film)
    {
        $films_id=DB::table('tbl_films')->orderby('IDf','desc')->get();
        $rooms_id=DB::table('tbl_rooms')->orderby('roomID','desc')->get();
        $all_films=DB::table('tbl_showtimes')->where('showID',$id_film)
        ->join('tbl_films','tbl_films.IDf','=','tbl_showtimes.MaPhim')->get();
        $data=view('admin.edit_showtime')->with('editshow',$all_films)->with('films_id',$films_id)->with('rooms',$rooms_id);
        return view('admin_layout')->with('admin.all_showtimes',$data);
    }
    public function update_showtime($id_film, Request $req)
    {
        $data=array();
        $data['MaPhong']=$req->tenphong;
        $data['MaPhim']=$req->tenphim;
        $data['NgayChieu']=$req->ngaykc;
        $data['GioBatDau']=$req->gbd;
        $data['GioKetThuc']=$req->gkt;
        $data['GioChieu']=$req->gbd.'h-'.$req->gkt.'h';
        DB::table('tbl_showtimes')->where('showID',$id_film)->update($data);
        Session::put('message','Sửa lịch chiếu thành công.');
        return Redirect::to('all-showtimes');       
    }
    public function delete_showtime_film($id_film)
    {
        DB::table('tbl_showtimes')->where('showID',$id_film)->delete();
        Session::put('message','Xóa lịch chiếu thành công.');
        return Redirect::to('all-showtimes');  
    }
}