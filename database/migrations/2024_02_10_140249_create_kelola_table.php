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
        Schema::create('kelola_keuangan', function (Blueprint $table) {
            $table->integer('id_kelola_keuangan')->autoIncrement();
            $table->integer('id_sumber_dana', false)->nullable(true);
            $table->integer('id_realisasi', false)->nullable(true);
            $table->integer('id_pembayaran', false)->nullable(true);
            $table->enum('tipe', ['Pemasukan', 'Pengeluaran']);
            $table->integer('jumlah_dana');
            $table->text('bukti');
            $table->date('waktu');

            $table->foreign('id_sumber_dana')->on('sumber_dana')
            ->references('id_sumber_dana')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_realisasi')->on('realisasi')
            ->references('id_realisasi')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_pembayaran')->on('pembayaran')
            ->references('id_pembayaran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
