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
        Schema::create('sumber_dana', function (Blueprint $table) {
            $table->integer('id_sumber_dana')->autoIncrement();
            $table->string('nama_sumber_dana',200);
            $table->string('dana_sumber_dana',200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_danas');
    }
};
