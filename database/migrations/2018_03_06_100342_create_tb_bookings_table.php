<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lap_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('hari');
            $table->integer('jadwal_id')->unsigned();
            $table->string('total_cost');
            $table->string('due_date');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lap_id')->references('id')->on('tb_lapangans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jadwal_id')->references('id')->on('tb_jadwals')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bookings');
    }
}
