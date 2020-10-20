<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Manufacturers extends Controller
{
    public function add_manufacturer_film()
    {
        return view('admin.create_manufacturer');
    }

    public function all_manufacturers_film()
    {
        $all_films=DB::table('tbl_manufacturers')->get();
        $data=view('admin.all_manufacturers')->with('allManufacturers',$all_films);

        return view('admin_layout')->with('admin.all_manufacturers',$data);
    }

    public function save_manufacturer(Request $req)
    {
        $data=array();

        $data['TenHSX']=$req->tenhsx;
        $data['TenNuoc']=$req->tennuoc;

        DB::table('tbl_manufacturers')->insert($data);
        Session::put('message','Thêm hãng sản xuất thành công.');
        return Redirect::to('all-manufacturers-film');
    }

    public function edit_manufacturer_film($id_film)
    {
        $all_films=DB::table('tbl_manufacturers')->where('ID',$id_film)->get();
        $data=view('admin.edit_manufacturer')->with('editManufacturer',$all_films);

        return view('admin_layout')->with('admin.all_manufacturers',$data);
    }

    public function update_manufacturer($id_film, Request $req)
    {
        $data=array();
        $data['TenTheLoai']=$req->tentheloai;
        $data['MoTa']=$req->mota;

        DB::table('tbl_genres')->where('ID',$id_film)->update($data);
        Session::put('message','Sửa hãng sản xuất thành công.');
        return Redirect::to('all-manufacturers-film');        
    }

    public function delete_manufacturer_film($id_film)
    {
        DB::table('tbl_manufacturers')->where('ID',$id_film)->delete();
        Session::put('message','Xóa hãng sản xuất thành công.');
        return Redirect::to('all-manufacturers-film');  
    }
}
