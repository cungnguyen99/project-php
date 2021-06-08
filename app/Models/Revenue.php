<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    public $timestamps = false;
    public static function getDecoration()
    {
        $revenue=DB::table('tbl_films')
        ->join('tbl_showtimes','tbl_films.IDf','=','tbl_showtimes.MaPhim')
        ->join('tbl_tickets','tbl_showtimes.showID','=','tbl_tickets.MaShow')
        ->select('tbl_films.TenPhim', 'tbl_films.NgayKhoiChieu', 'tbl_films.NgayKetThuc', DB::raw('sum(tbl_tickets.GiaVe) as revenue'))
        ->groupBy('tbl_films.IDf')->get(['TenPhim', 'revenue']);
        return $revenue;
    }
}
