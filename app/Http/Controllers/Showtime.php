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
        // $giochieu=$req->gbd+'-'+$req->gkt;
        $data['MaPhim']=$req->tenphim;
        $data['MaPhong']=$req->tenphong;
        $data['NgayChieu']=$req->ngaykc;
        $data['GioBatDau']=$req->gbd;
        $data['GioKetThuc']=$req->gkt;
        $data['GioChieu']='13h-15h';
        // dd(is_numeric($req->tentheloai));
        DB::table('tbl_showtimes')->insert($data);
        Session::put('message','Thêm thể loại thành công.');
        return Redirect::to('all-showtimes');
    }
    // public function edit_genre_film($id_film)
    // {
    //     $all_films=DB::table('tbl_genres')->where('ID',$id_film)->get();
    //     $data=view('admin.edit_genre')->with('editGenre',$all_films);
    //     return view('admin_layout')->with('admin.all_genres',$data);
    // }
    // public function update_genre($id_film, Request $req)
    // {
    //     $data=array();
    //     $data['TenTheLoai']=$req->tentheloai;
    //     $data['MoTa']=$req->mota;
    //     DB::table('tbl_genres')->where('ID',$id_film)->update($data);
    //     Session::put('message','Sửa thể loại thành công.');
    //     return Redirect::to('all-genres-film');        
    // }
    public function delete_showtime_film($id_film)
    {
        DB::table('tbl_showtimes')->where('showID',$id_film)->delete();
        Session::put('message','Xóa thể loại thành công.');
        return Redirect::to('all-showtimes');  
    }
}