<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tracking', 50);
            $table->date('tgl_transaksi');
            $table->dateTime('tgl_terkirim')->nullable();
            $table->dateTime('tgl_sampai')->nullable();
            $table->integer('berat')->nullable();
            $table->string('namePenerima', 100);
            $table->string('contactPenerima', 100);
            $table->string('status_pay', 20)->default('unpaid');
            $table->string('status_del', 20)->default(('packaging'));
            $table->integer('total')->nullable();
            $table->foreignId('customer_id');
            $table->foreignId('kota_id');
            $table->foreignId('province_id');
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
        Schema::dropIfExists('transactions');
    }
};
