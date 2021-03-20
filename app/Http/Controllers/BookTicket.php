<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
session_start();

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

        $show_times=DB::table('tbl_showtimes')->where('MaPhim',$id_film)->get();

        if($film===null){

            Session::put('mess','Phim chưa có lịch chiếu.');
            return view('pages.book_ticket');

        }else{
            return view('pages.book_ticket')
               ->with('film',$film)
               ->with('showTimes',$show_times);
        }

    }

    public function show_chair($time_id)
    {
       $room = DB::table('tbl_showtimes')->select('MaPhong')->where('showID','=',$time_id)->first()->MaPhong;
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
            return response()->json($array);
       }
       catch(Exception $ex){
           return response()->json("Error");
       }
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
            // DB::table('tbl_tickets')
            //         ->where('MaGhe','=', $ticker[$i]->MaGhe)
            //         ->update(['is_read' => 0]);
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
            $data['MaKH'] = $id;
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
        // dd("Thanh toan thanh cong");
        // $order_id = $request->vnp_TxnRef;
        // $data['total_money'] = $total_money = $request->vnp_Amount;
        // $data['order'] = $order = $this->order->where('order_id', $order_id)->first();
        // $order->pay_status = config('const.PAID');
        // $order->save();
        // $data['products'] = $order->product()->get();
        // $data['customer'] = $customer = $order->customer()->first();
        // $data['detail'] = $order_detail = Cart::content();
        // Mail::to($customer->email)
        //     ->send(new OrderSuccess($order, $customer, $order_detail, $total_money));
        // Cart::destroy();
        return view('pages.vnpay_return');
    }
}
