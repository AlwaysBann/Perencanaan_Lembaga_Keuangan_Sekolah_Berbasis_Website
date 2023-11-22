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
            $table->string('nama_penanggung_jawab');
            $table->string("nama_perencanaan",200);
            $table->date('waktu_realisasi');
            $table->integer('id_pengajuan', false);
            
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
