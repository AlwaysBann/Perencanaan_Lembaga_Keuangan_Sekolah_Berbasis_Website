<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran')->autoIncrement();
            $table->integer('id_tagihan', false);
            $table->integer('id_pengelola', false);
            $table->integer('nis_siswa', false);
            $table->string('jumlah_dana_pembayaran', 200);
            $table->dateTime('waktu_pembayaran');
            $table->string('bukti_pembayaran', false);

            $table->foreign('id_tagihan')->on('tagihan')
            ->references('id_tagihan')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_pengelola')->on('pengelola')
            ->references('id_pengelola')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('nis_siswa')->on('siswa')
            ->references('id_siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tpembayarans');
    }
};
