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
            $table->integer('id_kelas')->autoIncrement();
            $table->integer('id_angkatan', false);
            $table->integer('id_jurusan', false);
            $table->string('nama_kelas', 200);

            $table->foreign('id_angkatan')->on('angkatan')
            ->references('id_angkatan')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_jurusan')->on('jurusan')
            ->references('id_jurusan')->onDelete('cascade')->onUpdate('cascade');
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
