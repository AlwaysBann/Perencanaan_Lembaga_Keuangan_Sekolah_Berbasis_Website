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
        Schema::create('perencanaan', function (Blueprint $table) {
            $table->integer('id_perencanaan')->autoIncrement();
            $table->string('nama_penanggung_jawab');
            $table->string("nama_perencanaan",200);
            $table->date('waktu_realisasi');
            $table->integer('id_pengajuan', false);
            
            $table->foreign('id_pengajuan')->on('pengajuan')
            ->references('id_pengajuan')->onDelete('cascade')->onUpdate('cascade');
            
        });

        // DB::unprepared('DROP Procedure IF EXIST CreateDataPerencanaan');
        // DB::unprepared(
        //     "CREATE PROCEDURE CreateDataPerencanaan (
        //     IN p_nama_penanggung_jawab VARCHAR(255),
        //     IN p_nama_perencanaan VARCHAR(200),
        //     In p_id_pengajuan VARCHAR(255)
        //  )
        //  BEGIN
        //         DECLARE waktu TIMESTAMP;
        //         DECLARE pesan_error CHAR(5) DEFAULT '00000';
        //         BEGIN

        //         GET DIAGNOSTIC CONDITION 1 pesan_error = RETURNED_SQLSTATE;
        //         END;

        //         START TRANSACTION;
        //         SAVEPOINT satu;

        //         SET waktu = NOW();

        //         INSERT INTO perencanaan (
        //             nama_penanggung_jawab,
        //             nama_perencanaan,
        //             id_pengajuan,
        //             waktu_realisasi
        //         ) VALUES (
        //             p_nama_penanggung_jawab,
        //             p_nama_perencanaan,
        //             p_id_pengajuan
        //             waktu
        //         );

        //         IF pesan_error != '00000' THEN ROLLBACK TO satu;
        //         END IF;
        //         COMMIT;

        //  END"
        // );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan');
    }
};
