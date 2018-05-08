<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('id')->primary();
            $table->timestamps();
            //$table->integer('code')->unique();
            $table->string('status');
            $table->string('jadwal');
            $table->string('playermodel');
            $table->string('tarif');
            $table->string('tariftype');
            $table->string('tariftotal');
            $table->integer('customer_id')->unsigned();
            $table->integer('lap_id')->unsigned();

            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('lap_id')->references('id')->on('tb_lapangans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
