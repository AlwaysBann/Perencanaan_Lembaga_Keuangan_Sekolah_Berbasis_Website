<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->integer('id_user')->autoIncrement();
            $table->string('username', 255);
            $table->text('password');
            $table->enum('role', ['super_admin', 'siswa', 'peminta', 'pengelola']);
            $table->string('foto_profil')->nullable(true);
        });
        DB::unprepared('CREATE TRIGGER trgUserDelete AFTER DELETE ON tbl_user FOR EACH ROW BEGIN INSERT INTO logs(logs) VALUES (concat
        (\'Super Admin Menghapus Akun dengan id \', OLD.id_user, \' dengan nama \', \' \', OLD.username)); END;');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
