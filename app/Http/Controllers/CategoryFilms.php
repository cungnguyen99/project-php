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
        $data['MaHSX']=$req->hangsx;
        $data['MaTheLoai']=$req->theloai;
        $data['DaoDIen']=$req->daodien;
        $data['NgayKhoiChieu']=$req->ngaykc;
        $data['NgayKetThuc']=$req->ngaykt;
        $data['NamChinh']=$req->namchinh;
        $data['NuChinh']=$req->nuchinh;
        $data['TongChiPhi']=$req->tongchiphi;
        $data['Anh']=$req->url;

        // DB::table('tbl_films')->insert($data);

        Session::put('message','Thêm phim thành công.');
        return Redirect::to('all-category-films');
    }
}
