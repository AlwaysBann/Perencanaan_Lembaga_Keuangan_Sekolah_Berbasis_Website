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
        Schema::create('pengelola', function (Blueprint $table) {
            $table->integer('id_pengelola')->autoIncrement();
            $table->integer('id_jabatan_pengelola', false);
            $table->integer('id_user', false);
            $table->string('nama_pengelola')->nullable(false);
            $table->date('mulai_jabat')->nullable(false);
            $table->date('akhir_jabat')->nullable(false);

            $table->foreign('id_jabatan_pengelola')->on('jabatan_pengelola')
            ->references('id_jabatan_pengelola')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_user')->on('tbl_user')
            ->references('id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengelolas');
    }
};
