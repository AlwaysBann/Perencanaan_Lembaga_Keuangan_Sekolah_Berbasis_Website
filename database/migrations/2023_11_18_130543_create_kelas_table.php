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
        Schema::create('kelas', function (Blueprint $table) {
            $table->integer('id_realisasi')->autoIncrement();
            $table->integer('id_ruangan', false);
            $table->string('nama_realisasi', 200);
            $table->string('jumlah_dana_realisasi');
            $table->string('bukti_realisasi');

            $table->foreign('id_ruangan')->on('ruangan')
            ->references('id_ruangan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
