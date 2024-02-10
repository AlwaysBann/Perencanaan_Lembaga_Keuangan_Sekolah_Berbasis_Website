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
        Schema::table('sumber_dana', function (Blueprint $table) {
            $table->integer('id_kelola_keuangan', false)->nullable(true);
            
            $table->foreign('id_kelola_keuangan')->on('kelola_keuangan')
            ->references('id_kelola_keuangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
