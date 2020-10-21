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

    public function edit_manufacturer_film($id_manufacturer)
    {
        $all_films=DB::table('tbl_manufacturers')->where('ID',$id_manufacturer)->get();
        $data=view('admin.edit_manufacturer')->with('editManufacturer',$all_films);

        return view('admin_layout')->with('admin.all_manufacturers',$data);
    }

    public function update_manufacturer($id_manufacturer, Request $req)
    {
        $data=array();
        $data['TenHSX']=$req->tenhsx;
        $data['TenNuoc']=$req->tennuoc;

        DB::table('tbl_manufacturers')->where('ID',$id_manufacturer)->update($data);
        Session::put('message','Sửa hãng sản xuất thành công.');
        return Redirect::to('all-manufacturers-film');        
    }

    public function delete_manufacturer_film($id_manufacturer)
    {
        DB::table('tbl_manufacturers')->where('ID',$id_manufacturer)->delete();
        Session::put('message','Xóa hãng sản xuất thành công.');
        return Redirect::to('all-manufacturers-film');  
    }
}
