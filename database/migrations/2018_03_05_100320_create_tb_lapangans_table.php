<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lapangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('latlon')->nullable();
            $table->integer('price');
            $table->char('pricetype', 2)->nullable();
            $table->string('displayphoto');
            $table->string('houropen')->default('00:00');
            $table->string('hourclose')->default('23:59');

            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_lapangans');
    }
}
