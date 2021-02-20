<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
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
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $req)
    {
        // gán email nhập được vào biến email
        $email=$req->email;
        
        $password=md5($req->password);

        $res=DB::table('tbl_admin')->where ('email',$email)->where('password',$password)->first();

        if($res){
            Session::put('name',$res->name);
            Session::put('id',$res->id);
            return Redirect::to('/book-ticket/23');
        }else{
            //biến message dùng trong view admin_login để hiện ra dòng chữ wrong pass...
            Session::put('message',"Wrong password or email!");
            return Redirect::to('/admin');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/admin');  
    }
}
