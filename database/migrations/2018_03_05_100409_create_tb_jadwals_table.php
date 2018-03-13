<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapangan_id')->unsigned();
            $table->string('jadwal_lapangan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('lapangan_id')->references('id')->on('tb_lapangans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jadwals');
    }
}
