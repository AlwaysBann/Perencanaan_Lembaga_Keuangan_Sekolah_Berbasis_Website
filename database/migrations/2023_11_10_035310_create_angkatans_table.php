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
        Schema::create('angkatan', function (Blueprint $table) {
            $table->integer('id_angkatan')->autoIncrement();
            $table->integer('no_angkatan', false);
            $table->string('tahun_masuk');
            $table->string('tahun_keluar');
        });
        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataAngkatan");
        DB::unprepared(
        "CREATE PROCEDURE CreateDataAngkatan(no_angkatan INT(11), tahun_masuk VARCHAR(255), tahun_keluar VARCHAR(255))
            BEGIN
                DECLARE pesan_error CHAR(5) DEFAULT '00000';
                BEGIN
                    GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
                END;

                START TRANSACTION;
                SAVEPOINT satu;

                INSERT INTO angkatan(no_angkatan, tahun_masuk, tahun_keluar) VALUES (no_angkatan, tahun_masuk, tahun_keluar);

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
        Schema::dropIfExists('angkatan');
    }
};