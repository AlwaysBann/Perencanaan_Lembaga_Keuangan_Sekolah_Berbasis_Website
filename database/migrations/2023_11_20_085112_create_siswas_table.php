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

        DB::unprepared("DROP PROCEDURE IF EXISTS CreateDataSiswa");
        DB::unprepared(
            "CREATE PROCEDURE CreateDataSiswa(
                id_user INT(11),
                nis_siswa INT(11),
                nama_siswa VARCHAR(200),
                jenis_kelamin ENUM('Laki-Laki', 'Perempuan'),
                no_telp INT(11),
                id_kelas INT(11)
            )
            BEGIN
                DECLARE pesan_error CHAR(5) DEFAULT '00000';
                BEGIN

                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
                END;

                START TRANSACTION;
                SAVEPOINT satu;

                INSERT INTO siswa (id_user, nis_siswa, nama_siswa, jenis_kelamin, no_telp, id_kelas)
                VALUES (id_user, nis_siswa, nama_siswa, jenis_kelamin, no_telp, id_kelas);

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
        Schema::dropIfExists('siswa');
    }
};
