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

        // dd(is_numeric($req->tentheloai));
        if(!is_numeric($req->tentheloai)&&!is_numeric($req->mota)){
            DB::table('tbl_genres')->insert($data);
            Session::put('message','Thêm thể loại thành công.');
            return Redirect::to('all-genres-film');
        }else{
            Session::put('message','Thêm thể loại không thành công.');
            return Redirect::to('all-genres-film');
        }
    }

    public function edit_genre_film($id_film)
    {
        $all_films=DB::table('tbl_genres')->where('ID',$id_film)->get();
        $data=view('admin.edit_genre')->with('editGenre',$all_films);

        return view('admin_layout')->with('admin.all_genres',$data);
    }

    public function update_genre($id_film, Request $req)
    {
        $data=array();
        $data['TenTheLoai']=$req->tentheloai;
        $data['MoTa']=$req->mota;

        DB::table('tbl_genres')->where('ID',$id_film)->update($data);
        Session::put('message','Sửa thể loại thành công.');
        return Redirect::to('all-genres-film');        
    }

    public function delete_genre_film($id_film)
    {
        DB::table('tbl_genres')->where('ID',$id_film)->delete();
        Session::put('message','Xóa thể loại thành công.');
        return Redirect::to('all-genres-film');  
    }
}
