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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->integer('id_pengajuan')->autoIncrement();
            $table->string('nama_pengaju');
            $table->string("nama_pengajuan",200);
            $table->string('tujuan_pengajuan', 200);
            $table->integer('id_ruangan', false);
            $table->string('nama_item');
            $table->string('jumlah_item');
            $table->string('spesifikasi_item');
            $table->integer('harga_satuan');        
            $table->string('jenis_item');
            $table->date('waktu_pengajuan');
            $table->text('gambar_item');

            $table->foreign('id_ruangan')->on('ruangan')
            ->references('id_ruangan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
