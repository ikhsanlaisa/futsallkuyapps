<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDokupayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DokuPayments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('invoice_number');
            $table->integer('amount');
            $table->integer('customer_id')->unsigned();
            $table->integer('lap_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('payment_desc')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_channel');
            $table->string('payment_approval_code')->nullable();
            $table->string('payment_session_id')->nullable();

            $table->foreign('customer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DokuPayments');
    }
}
