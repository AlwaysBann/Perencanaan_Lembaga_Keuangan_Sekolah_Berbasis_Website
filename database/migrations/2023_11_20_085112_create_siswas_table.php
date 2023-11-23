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
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('id_siswa')->autoIncrement();
            $table->integer('id_kelas', false);
            $table->integer('id_user', false);
            $table->integer('nis_siswa', false);
            $table->string('nama_siswa', 200);
            $table->enum('jenis_kelamin', ["Laki-Laki","Perempuan"]);
            $table->integer('no_telp', false);

            $table->foreign('id_user')->on('tbl_user')
            ->references('id_user')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_kelas')->on('kelas')
            ->references('id_kelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
