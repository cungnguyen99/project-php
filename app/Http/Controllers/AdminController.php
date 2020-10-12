<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboard(Request $req)
    {
        $email=$req->email;
        
        $password=md5($req->password);

        $res=DB::table('tbl_admin')->where ('email',$email)->where('password',$password)->first();

        return view('admin.dashboard');
    }
}
