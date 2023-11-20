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
        Schema::create('perencanaan', function (Blueprint $table) {
            $table->integer('id_perencanaan')->autoIncrement();
            $table->string('nama_perencana');
            $table->string("nama_perencanaan",200);
            $table->string('tujuan_perencanaan', 200);
            $table->integer('id_ruangan', false);
            $table->date('waktu_realisasi');
            $table->string('nama_item');
            $table->integer('jumlah_item');
            $table->string('spesifikasi_item');        
            $table->integer('harga_item');
            $table->string('jenis_item');
            $table->date('waktu_pengajuan');
            $table->integer('id_pengajuan', false);

            $table->foreign('id_ruangan')->on('ruangan')
            ->references('id_ruangan')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('id_pengajuan')->on('pengajuan')
            ->references('id_pengajuan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan');
    }
};
