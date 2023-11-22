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
        Schema::create('peminta', function (Blueprint $table) {
            $table->integer('id_peminta')->autoIncrement();
            $table->integer('id_jabatan_peminta', false);
            $table->integer('id_user', false);
            $table->string('nama_peminta')->nullable(false);
            $table->date('mulai_jabat')->nullable(false);
            $table->date('akhir_jabat')->nullable(false);

            $table->foreign('id_jabatan_peminta')->on('jabatan_peminta')
            ->references('id_jabatan_peminta')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_user')->on('tbl_user')
            ->references('id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemintas');
    }
};
