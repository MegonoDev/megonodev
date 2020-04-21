<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksiHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice');
            $table->string('nama');
            $table->decimal('total_harga');
            $table->decimal('pajak')->default(10)->comment("Bisa pajak bisa simpanan pokok dalam persen");
            $table->string('keterangan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_akun');
            $table->timestamps();

            $table->foreign('id_akun')->references('id_akun')->on('akuns')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_headers');
    }
}
