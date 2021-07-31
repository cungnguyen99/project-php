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
        $allShowtime=DB::table('tbl_showtimes')->get();

        $allShowtime_arr=array();
        $allStartHours_arr=array();
        $allEndHours_arr=array();
        $allRoom_arr=array();

        for ($x = 0; $x < count($allShowtime); $x++) {
            $allShowtime_arr[$x]=$allShowtime[$x]->NgayChieu;
            $allStartHours_arr[$x]=$allShowtime[$x]->GioBatDau;
            $allEndHours_arr[$x]=$allShowtime[$x]->GioKetThuc;
            if($allShowtime[$x]->NgayChieu===(new DateTime($req->ngaykc))->format('d-m-Y')){
                $allRoom_arr[$x]=$allShowtime[$x]->MaPhong;
            }
        }
        $check_date=in_array((new DateTime($req->ngaykc))->format('d-m-Y'),$allShowtime_arr);
        $check_room=in_array($req->tenphong,$allRoom_arr);
        $check_time=true;
        $data=array();
        for ($x = 0; $x < count($allShowtime); $x++) {
            if(
            $allShowtime[$x]->NgayChieu==(new DateTime($req->ngaykc))->format('d-m-Y')&&
            $allShowtime[$x]->MaPhong==$req->tenphong&&
            ((int)($req->gbd)>=$allStartHours_arr[$x]&&(int)($req->gbd)<=$allEndHours_arr[$x]||
            (int)($req->gkt)>=$allStartHours_arr[$x]&&(int)($req->gkt)<=$allEndHours_arr[$x]))
            {
                $check_time=true;   
                break;
            }else{
                $check_time=false;
            }
        }

        if($req->gbd == null || $req->gkt == null || $req->tenphim == null ||
           $req->ngaykc == null || $req->tenphong == null ){
            Session::put('error','Nhập đầy đủ thông tin cho các trường để tiếp tục.');
            return Redirect::to('add-showtime');
        }

        if((new Carbon($req->ngaykc))<Carbon::now()){
            Session::put('error','Ngày chiếu phải lớn hơn ngày hiện tại.');
            return Redirect::to('add-showtime');
        }
        if((int)($req->gbd)>=(int)($req->gkt)){
            Session::put('error','Giờ bắt đầu phải nhỏ hơn giờ kết thúc.');
            return Redirect::to('add-showtime');
        }
        
        if($check_date){
            if($check_room){
                if($check_time){
                    Session::put('error','Lịch chiếu đã có.');
                    return Redirect::to('all-showtimes');
                }else{
                    $data['MaPhim']=$req->tenphim;
                    $data['MaPhong']=$req->tenphong;
                    $data['NgayChieu']=(new DateTime($req->ngaykc))->format('d-m-Y');
                    $data['GioBatDau']=$req->gbd;
                    $data['GioKetThuc']=$req->gkt;
                    $data['GioChieu']=$req->gbd.'h-'.$req->gkt.'h';
                    DB::table('tbl_showtimes')->insert($data);
                    Session::put('message','Thêm lịch chiếu thành công.');
                    return Redirect::to('all-showtimes');
                }
            }else{
                $data['MaPhim']=$req->tenphim;
                $data['MaPhong']=$req->tenphong;
                $data['NgayChieu']=(new DateTime($req->ngaykc))->format('d-m-Y');
                $data['GioBatDau']=$req->gbd;
                $data['GioKetThuc']=$req->gkt;
                $data['GioChieu']=$req->gbd.'h-'.$req->gkt.'h';
                DB::table('tbl_showtimes')->insert($data);
                Session::put('message','Thêm lịch chiếu thành công.');
                return Redirect::to('all-showtimes');
            }
        }else{
            $data['MaPhim']=$req->tenphim;
            $data['MaPhong']=$req->tenphong;
            $data['NgayChieu']=(new DateTime($req->ngaykc))->format('d-m-Y');
            $data['GioBatDau']=$req->gbd;
            $data['GioKetThuc']=$req->gkt;
            $data['GioChieu']=$req->gbd.'h-'.$req->gkt.'h';
            DB::table('tbl_showtimes')->insert($data);
            Session::put('message','Thêm lịch chiếu thành công.');
            return Redirect::to('all-showtimes');
        }

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
        $data['NgayChieu']=(new DateTime($req->ngaykc))->format('d-m-Y');
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