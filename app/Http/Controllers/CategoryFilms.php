<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Exports\ExcelExport;
use Excel;
use App\Revenue;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

session_start();

class CategoryFilms extends Controller
{
    public function AuthLogin()
    {
        $id=Session::get('id');
        $res=DB::table('tbl_admin')->where ('id',$id)->first();

        if($id && $res->role=1){
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
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $films=DB::table('tbl_films')->orderby('IDf','desc')->paginate(8);

        // $films=DB::table('tbl_films')->whereDate('NgayKhoiChieu','>=',date($weekStartDate))->whereDate('NgayKetThuc','<=', date($weekEndDate))->orderby('IDf','desc')->paginate(8);

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
        $data['Trailer']=$req->tongchiphi;
        $data['NoiDung']=$req->noidung;
        
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
        $data['Trailer']=$req->tongchiphi;
        $data['NoiDung']=$req->noidung;

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
        ->first();

        $related_films=DB::table('tbl_films')
        ->join('tbl_manufacturers','tbl_films.MaHSX','=','tbl_manufacturers.ID')
        ->join('tbl_genres','tbl_films.MaTheLoai','=','tbl_genres.ID')
        ->where('tbl_films.MaTheloai', $single_film->MaTheLoai)
        ->where('tbl_films.IDf', '!=', $single_film->IDf)
        ->get();


        return view('pages.movie_single')->with('singleFilm',$single_film)->with('relatedFilms',$related_films); 
    }

    public function cart($user_id)
    {
        $chairs=DB::table('tbl_tickets')->join('payments','payments.order_id','=','tbl_tickets.MaDonHang')
        ->where('payments.user_id',$user_id)->get();
        $arr_ticket=array();
        foreach ($chairs as $value) {
            $arr_ticket[$value->MaDonHang][] = $value->MaGhe;
        }
        $carts=DB::table('tbl_tickets')
        ->join('tbl_showtimes','tbl_showtimes.showID','=','tbl_tickets.MaShow')
        ->join('tbl_films','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->join('tbl_chairs','tbl_chairs.chairID','=','tbl_tickets.MaGhe')
        ->join('payments','payments.order_id','=','MaDonHang')
        ->where('payments.user_id',$user_id)
        ->groupBy('MaDonHang')
        ->get();
        return view('pages.cart')->with('carts',$carts)->with('chairs',$arr_ticket);
    }

    public function cancel($time)
    {
        $id=Session::get('id');
        DB::table('tbl_tickets')->where('MaDonHang',$time)->delete();
        DB::table('payments')->where('order_id',$time)->delete();
        return Redirect::to('cart/'.$id);  
    }

    public function films_actor($name)
    {
        $films_actor=DB::table('tbl_films')->where('DaoDien',$name)->paginate(8);
        return view('pages.films_actor')->with('films', $films_actor); 
    }

    public function revenue_films()
    {
        $revenue=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->join('tbl_tickets','tbl_showtimes.showID','=','tbl_tickets.MaShow')
        ->select(DB::raw('sum(tbl_tickets.GiaVe) as revenue'), 'tbl_films.*')
        ->groupBy('tbl_films.IDf')->get();
        return view('admin.revenue_films')->with('revenue',$revenue); 
    }

    public function export_excel()
    {
        return Excel::download(new ExcelExport, 'test.xlsx');
    }

    public function revenue_month()
    {
        $revenue=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->join('tbl_tickets','tbl_showtimes.showID','=','tbl_tickets.MaShow')
        ->select(DB::raw('sum(tbl_tickets.GiaVe) as revenue'), 'tbl_films.*')
        ->groupBy('tbl_films.IDf')->get();
        return view('admin.revenue_films')->with('revenue',$revenue); 
    }

    public function payment_report()
    {
        $revenue=DB::table('payments')
        ->join('tbl_admin','tbl_admin.id','=','payments.user_id')
        ->get();

        return view('admin.all_payment')->with('revenue',$revenue); 
    }

    public function manager_users()
    {
        $accounts=DB::table('tbl_admin')->get();
        return view('admin.manager_user')->with('accounts',$accounts); 
    }

    public function delete_user($id)
    {
        DB::table('tbl_admin')->where('id',$id)->delete();
        Session::put('message','Xóa user thành công.');
        return Redirect::to('/manager-users');  
    }

    public function active_user($id)
    {
        DB::table('tbl_admin')->where('id',$id)->update(['role'=>1]);
        Session::put('message','Cấp quyền thành công.');
        return Redirect::to('/manager-users');  
    }

    public function unactive_user($id)
    {
        DB::table('tbl_admin')->where('id',$id)->update(['role'=>0]);
        Session::put('message','Cấp quyền thành công.');
        return Redirect::to('/manager-users');  
    }
}
