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

    public function index_signin()
    {
        return view('sign_in');
    }

    public function save_sigin(Request $req)
    {
        $data=array();
        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['password']=md5($req->password);
        $data['phone']=$req->phone;
        DB::table('tbl_admin')->insert($data);
        return Redirect::to('/admin');
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
        
        if($res&&$res->role==0){
            Session::put('name',$res->name);
            Session::put('id',$res->id);
            return Redirect::to('/');
            // return Redirect::to('/book-ticket/1');
            // if(isset($_REQUEST['redirurl'])) 
            // {

            //     $url = $_REQUEST['redirurl'];
            // }
            // else {
    
            //     $url = "student_account.php";
            // }
            // dd($url, $_SERVER['HTTP_REFERER']);
            // header("Location:$url");
        }else if($res&&$res->role==1){
            Session::put('name',$res->name);
            Session::put('id',$res->id);
            return Redirect::to('/dashboard');
        }else{
            //biến message dùng trong view admin_login để hiện ra dòng chữ wrong pass...
            Session::put('message',"Wrong password or email!");
            return Redirect::to('/admin');
        }
    }

    // protected function redirectTo(){
    //     return Request::session()->get('url.intended')??'/home';
    // }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/admin');  
    }
}
