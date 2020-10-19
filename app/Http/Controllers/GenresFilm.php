<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class GenresFilm extends Controller
{
    public function add_genre_film()
    {
        return view('admin.create_genre');
    }

    public function all_genres_film()
    {
        $all_films=DB::table('tbl_genres')->get();
        $data=view('admin.all_genres')->with('allGenres',$all_films);

        return view('admin_layout')->with('admin.all_genres',$data);
    }

    public function save_genre(Request $req)
    {
        $data=array();

        $data['TenTheLoai']=$req->tentheloai;
        $data['MoTa']=$req->mota;

        DB::table('tbl_genres')->insert($data);
        Session::put('message','Thêm thể loại thành công.');
        return Redirect::to('all-genres-film');
    }

    public function edit_category_film($id_film)
    {
        $all_films=DB::table('tbl_genres')->where('ID',$id_film)->get();
        $data=view('admin.edit_film')->with('editFilm',$all_films);

        return view('admin_layout')->with('admin.all_films',$data);
    }

    public function update_film($id_film, Request $req)
    {
        $data=array();
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
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/films',$new_image);
            $data['Anh']= $new_image;
            DB::table('tbl_films')->update($data);
            Session::put('message','Thêm phim thành công.');
            return Redirect::to('all-category-films');
        }
        DB::table('tbl_films')->where('ID',$id_film)->update($data);
        Session::put('message','Sửa phim thành công.');
        return Redirect::to('all-category-films');        
    }

    public function delete_category_film($id_film)
    {
        DB::table('tbl_films')->where('ID',$id_film)->delete();
        Session::put('message','Xóa phim thành công.');
        return Redirect::to('all-category-films');  
    }
}
