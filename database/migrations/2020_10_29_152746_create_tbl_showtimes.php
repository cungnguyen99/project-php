<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShowtimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_showtimes', function (Blueprint $table) {
            $table->Increments('showID');
            $table->Integer('MaPhim');
            $table->Integer('MaPhong');
            $table->String('GioChieu');
            $table->String('NgayChieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_showtimes');
    }
}
