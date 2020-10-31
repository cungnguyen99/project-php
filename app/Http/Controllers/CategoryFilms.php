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
    public function AuthLogin()
    {
        $id=Session::get('id');

        if($id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send(); 
        }
    }

    public function add_category_film()
    {
        $this->AuthLogin();
        $genres_id=DB::table('tbl_genres')->orderby('ID','desc')->get();
        $manufacturers_id=DB::table('tbl_manufacturers')->orderby('ID','desc')->get();
        return view('admin.create_film')->with('genres_id',$genres_id)->with('manufacturers_id',$manufacturers_id);
    }

    public function all_films()
    {
        $films=DB::table('tbl_films')->orderby('IDf','desc')->get();

        return view('pages.all_films')->with('films',$films);
    }

    public function all_category_films()
    {
        //lấy hết hàng trong bảng films
        $all_films=DB::table('tbl_films')
        ->join('tbl_manufacturers','tbl_films.MaHSX','=','tbl_manufacturers.ID')
        ->join('tbl_genres','tbl_films.MaTheLoai','=','tbl_genres.ID')
        ->orderby('tbl_films.IDf','desc')->get();

        //đưa dữ liệu sang bên file all_films trong view để hiện ra trang all_category_films
        $data=view('admin.all_films')->with('allFilms',$all_films);

        return view('admin_layout')->with('admin.all_films',$data);
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

    public function edit_category_film($id_film)
    {
        $genres_id=DB::table('tbl_genres')->orderby('tbl_genres.ID','desc')->get();
        $manufacturers_id=DB::table('tbl_manufacturers')->orderby('tbl_manufacturers.ID','desc')->get(); 
        $all_films=DB::table('tbl_films')->where('IDf',$id_film)->first();
        $data= view('admin.edit_film')->with('editFilm',$all_films)->with('genres',$genres_id)->with('manufacturers',$manufacturers_id);

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
        DB::table('tbl_films')->where('IDf',$id_film)->update($data);
        Session::put('message','Sửa phim thành công.');
        return Redirect::to('all-category-films');        
    }

    public function delete_category_film($id_film)
    {
        DB::table('tbl_films')->where('IDf',$id_film)->delete();
        Session::put('message','Xóa phim thành công.');
        return Redirect::to('all-category-films');  
    }

    public function single_film($id_film)
    {        
        $single_film=DB::table('tbl_films')
        ->join('tbl_manufacturers','tbl_films.MaHSX','=','tbl_manufacturers.ID')
        ->join('tbl_genres','tbl_films.MaTheLoai','=','tbl_genres.ID')
        ->where('tbl_films.IDf', $id_film)
        ->get();

        $related_films=DB::table('tbl_films')
        ->join('tbl_manufacturers','tbl_films.MaHSX','=','tbl_manufacturers.ID')
        ->join('tbl_genres','tbl_films.MaTheLoai','=','tbl_genres.ID')
        ->where('tbl_films.MaTheloai', $single_film[0]->MaTheLoai)
        ->get();


        return view('pages.movie_single')->with('singleFilm',$single_film)->with('relatedFilms',$related_films); 
    }

    public function book_ticket()
    {
        
        return view('pages.book_ticket');
    }
}
