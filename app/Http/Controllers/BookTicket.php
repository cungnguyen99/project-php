<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();
/**
 * Ngân hàng: NCB
 * Số thẻ: 9704198526191432198
 * Tên chủ thẻ:NGUYEN VAN A
 * Ngày phát hành:07/15
 * Mật khẩu OTP:123456
 */
class chairsTable{
    public $id;
    public $chair_des;
    public $type;
}
class BookTicket extends Controller
{

    public function AuthLogin()
    {
        $id=Session::get('id');

        if($id){
            return Redirect::to('/all-films');
        }else{
            return Redirect::to('/admin')->send(); 
        }
    }
    
    public function book_ticket($id_film, Request $req)
    {
        $this->AuthLogin();
        $film=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('IDf',$id_film)->first();
        $date=Session::get('date');
        if($date){
            $d=(new DateTime($date))->format('d-m-Y');
            $show_times=DB::table('tbl_showtimes')->where('MaPhim',$id_film)->where('NgayChieu','=',$d)->groupBy('NgayChieu')->get();
            
            if($film===null){
                
                Session::put('mess','Phim chưa có lịch chiếu.');
                return view('pages.book_ticket');
                
            }else{
                Session::put('date',null);  
                return view('pages.book_ticket')
                ->with('film',$film)
                ->with('showTimes',$show_times);
            }
        }else{
            // DB::enableQueryLog();
            $now = Carbon::now()->format('d-m-Y');
            $show_times=DB::table('tbl_showtimes')
            ->where('MaPhim',$id_film)
            ->where(DB::raw("UNIX_TIMESTAMP(STR_TO_DATE(NgayChieu, '%d-%m-%Y'))"),'>=',Carbon::now()->timestamp)
            ->groupBy('NgayChieu')->get();
            // dd(DB::getQueryLog());
            // dd(Carbon::now()->timestamp, $show_times);
            if($film===null){
    
                Session::put('mess','Phim chưa có lịch chiếu.');
                return view('pages.book_ticket');
    
            }else{
                return view('pages.book_ticket')
                   ->with('film',$film)
                   ->with('showTimes',$show_times);
            }
        }

    }

    public function show_chair($id, $time_id, $timeshow)
    {
       $room = DB::table('tbl_showtimes')->select('MaPhong')->where('showID','=',$time_id)->first()->MaPhong;
       $time_arr = DB::table('tbl_showtimes')->where('NgayChieu','=',$timeshow)->where('MaPhim','=',$id)->get();

       Session::put('room',$room);
       try{
            $chair = DB::table('tbl_chairs')->where('MaPhong','=', $room)->get();
            $array = array();
            foreach($chair as $item){
                $ticker = DB::table('tbl_tickets')->where('MaShow', '=', $time_id)
                                        ->where('MaGhe', '=', $item->chairID)
                                        ->get();
                
                $chairs = new chairsTable;
                $chairs->id = $item->chairID;
                $chairs->chair_des = $item->tenGhe;

                if(count($ticker) > 0){
                    $chairs->type = true;
                }
                else{
                    $chairs->type = false;
                }

                $array[] = $chairs;
            }
            return response()->json([$array,$room, $time_arr]);
       }
       catch(Exception $ex){
           return response()->json("Error");
       }
    }

    public function time_show($id, $date){
        $time_arr = DB::table('tbl_showtimes')->where('NgayChieu','=',$date)->where('MaPhim','=',$id)->get();
        return response()->json($time_arr);
    }

    public function payment(Request $req)
    {
        $showtime=Session::get('showtime');
        $id=Session::get('id');
        $room=Session::get('room');
        $user=DB::table('tbl_admin')->where('id',$id)->first();
        $max_created_at=DB::table('tbl_tickets')->max('created_at');
        $ticker = DB::table('tbl_tickets')->select('MaGhe')->where('created_at','=',$max_created_at)->get();
        $arr_ticket=array();
        $chair=Session::get('selectchair');
        $money=count($ticker)*50000;
        Session::put('money',$money);
        for($i=0;$i<count($ticker);$i++){
            $ticket=DB::table('tbl_chairs')->select('TenGhe')->where('chairID','=', $ticker[$i]->MaGhe)->first()->TenGhe;
            array_push($arr_ticket,$ticket);
        }
        $date=DB::table('tbl_showtimes')->where('showID',$showtime)->first();
        $filmTicket=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('showID',$showtime)->first();
        return view('pages.payment')
        ->with('filmTicket',$filmTicket)
        ->with('user',$user)
        ->with('date',$date)
        ->with('ticket',$arr_ticket)
        ->with('money',$money)
        ->with('room',$room);
    }

    public function save_payment(Request $req)
    {
        $id=Session::get('id');
        Session::put('showtime',$req->showtime);
        $money=count((array)$req->arr_chairs)*50000;
        Session::put('money',$money);
        $data=array();
        $arr_chairs=array();
        for($i = 0; $i < count((array)$req->arr_chairs); $i++){
            array_push($arr_chairs,$req->arr_chairs[$i]);
            $data['MaShow'] = $req->showtime;
            $data['MaGhe'] = $req->arr_chairs[$i];
            $data['GiaVe'] = $req->giaVe;
            $data['is_read']=1;
            DB::table('tbl_tickets')->insert($data);
        }
        Session::put('selectchair',$arr_chairs);
        return Redirect::to('/payment'); 
    }

    public function payment_online(Request $req)
    {
        $showtime=Session::get('showtime');
        $id=Session::get('id');
        $room=Session::get('room');
        $money=Session::get('money');
        $user=DB::table('tbl_admin')->where('id',$id)->first();
        $date=DB::table('tbl_showtimes')->where('showID',$showtime)->first();
        $filmTicket=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->where('showID',$showtime)->first();
        return view('pages.payment_online')
        ->with('filmTicket',$filmTicket)
        ->with('user',$user)
        ->with('date',$date)
        ->with('money',$money);
    }

    function PayURL($money = 0, $order_id = null)
    {
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay_return');
        $vnp_TmnCode = "FEST0RT1";
        $vnp_HashSecret = "ZFUIJSMWYLIKQTEAJLGOTIRAQUQAESPW";

        $vnp_TxnRef = $order_id;
        $vnp_Amount = $money * 100;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => 'vn',
            "vnp_OrderInfo" => 'Thanh toan ve xem phim',
            "vnp_OrderType" => 'billpayment',
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return $vnp_Url;
    }

    public function SubmitVnPay(Request $req)
    {
        $vnp_Url = $this->PayURL($req->money, $req->order_id);
        return response()->json($vnp_Url, 200);
    }

    public function vnpayreturn(Request $request)
    {
        $order_id = $_GET['vnp_TxnRef'];
        $id=Session::get('id');
        $money = $_GET['vnp_Amount']/100;
        $note = $_GET['vnp_OrderInfo'];
        $vnp_response_code = $_GET['vnp_ResponseCode'];
        $code_vnpay = $_GET['vnp_TransactionNo'];
        $code_bank = $_GET['vnp_BankCode'];
        $time = $_GET['vnp_PayDate'];
        $data['order_id'] = $order_id;
        $data['user_id']=$id;
        $data['money'] = $money;
        $data['note'] = $note;
        $data['vnp_response_code']=$vnp_response_code;
        $data['code_vnpay'] = $code_vnpay;
        $data['code_bank']=$code_bank;
        $data['time']=$time;
        $max_created_at=DB::table('tbl_tickets')->max('created_at');
        DB::table('payments')->insert($data);
        DB::table('tbl_tickets')->where('created_at','=',$max_created_at)->update(['MaDonHang'=>$order_id]);
        return view('pages.vnpay_return');
    }
}
