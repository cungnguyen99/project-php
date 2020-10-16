<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

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

    public function save_film(Request $req)
    {
        $data=array();
        //tên côt-tên của trường name trong input
        $data['TenPhim']=$req->tenphim;
        $data['IMDB']=$req->imdb;
        $data['MaHSX']=$req->hangsx;
        $data['MaTheLoai']=$req->theloai;
        $data['DaoDIen']=$req->daodien;
        $data['NgayKhoiChieu']=$req->ngaykc;
        $data['NgayKetThuc']=$req->ngaykt;
        $data['NamChinh']=$req->namchinh;
        $data['NuChinh']=$req->nuchinh;
        $data['TongChiPhi']=$req->tongchiphi;

        $get_image=$req->file('url');

        if($get_image){
            //lấy tên file trong folder upload có cả đuôi mở rộng
            $get_name_image=$get_image->getClientOriginalName();
            //lấy tên file không có đuôi mở rộng current: lấy phần tử trc, end: lấy sau, explode: tách chuỗi
            $name_image=current(explode('.',$get_name_image));
            //lấy tên file
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //chuyển đến folder films
            $get_image->move('public/uploads/films',$new_image);
            //nếu có chọn ảnh thì cho vào màng $data
            $data['Anh']= $new_image;
            DB::table('tbl_films')->insert($data);
            Session::put('message','Thêm phim thành công.');
            return Redirect::to('all-category-films');
        }
        $data['Anh']= ' ';
        DB::table('tbl_films')->insert($data);
        Session::put('message','Thêm phim thành công.');
        return Redirect::to('all-category-films');
    }
}
