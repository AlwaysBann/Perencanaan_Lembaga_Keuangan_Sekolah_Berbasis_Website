<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataKelas");
        DB::unprepared(
        "CREATE PROCEDURE CreateDataKelas(nama_kelas VARCHAR(200), id_angkatan INT(11), id_jurusan INT(11))
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';
            BEGIN

            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO kelas(nama_kelas, id_angkatan, id_jurusan) VALUES (nama_kelas, id_angkatan, id_jurusan);

            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
