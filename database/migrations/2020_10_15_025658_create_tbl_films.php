<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_films', function (Blueprint $table) {
            $table->Increments('ID');
            $table->String('TenPhim');
            $table->String('MaHSX');
            $table->String('MaTheLoai');
            $table->String('DaoDien');
            $table->String('NgayKhoiChieu');
            $table->String('NgayKetThuc');
            $table->String('NuChinh');
            $table->String('NamChinh');
            $table->String('TongChiPhi');
            $table->String('Anh');
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
        Schema::dropIfExists('tbl_films');
    }
}
