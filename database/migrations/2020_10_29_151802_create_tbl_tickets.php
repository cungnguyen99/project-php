<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tickets', function (Blueprint $table) {
            $table->Integer('MaShow');
            $table->Integer('MaGhe');
            $table->Integer('GiaVe');
            $table->Integer('MaKH');
            $table->Integer('is_read');
            $table->timestamp('created_at');
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
        Schema::dropIfExists('tbl_tickets');
    }
}
