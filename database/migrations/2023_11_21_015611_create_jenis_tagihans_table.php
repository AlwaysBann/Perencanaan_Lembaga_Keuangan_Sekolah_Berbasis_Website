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
        Schema::create('JenisTagihan', function (Blueprint $table) {
            $table->integer('id_jenis_tagihan')->autoIncrement();
            $table->string('nama_jenis_tagihan');
        });
        DB::unprepared('DROP Procedure IF EXISTS CreateDataJenisTagihan');
        DB::unprepared(
        "CREATE PROCEDURE CreateDataJenisTagihan(JenisTagihan VARCHAR(255))
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';
            BEGIN

            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO JenisTagihan(nama_jenis_tagihan) VALUES (JenisTagihan);

            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END;"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('JenisTagihan');
    }
};
