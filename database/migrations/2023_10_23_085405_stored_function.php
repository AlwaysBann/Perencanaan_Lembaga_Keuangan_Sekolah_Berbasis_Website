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
        DB::unprepared('DROP FUNCTION IF EXISTS CountAkun');
        DB::unprepared('
        CREATE FUNCTION CountAkun() RETURNS INT
        BEGIN
            DECLARE Akun INT;
            SELECT COUNT(*) INTO Akun FROM tbl_user;
            RETURN Akun;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountPengajuan');
        DB::unprepared('
        CREATE FUNCTION CountPengajuan() RETURNS INT
        BEGIN
            DECLARE Pengajuan INT;
            SELECT COUNT(*) INTO Pengajuan FROM pengajuan;
            RETURN Pengajuan;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountPerencanaan');
        DB::unprepared('
        CREATE FUNCTION CountPerencanaan() RETURNS INT
        BEGIN
            DECLARE Perencanaan INT;
            SELECT COUNT(*) INTO Perencanaan FROM perencanaan;
            RETURN Perencanaan;
        END
        ');
        
        DB::unprepared('DROP FUNCTION IF EXISTS CountKelas');
        DB::unprepared('
            CREATE FUNCTION CountKelas() RETURNS INT
            BEGIN
                DECLARE Kelas INT;
                SELECT COUNT(*) INTO Kelas FROM kelas;
                RETURN Kelas;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountSiswa');
        DB::unprepared('
            CREATE FUNCTION CountSiswa() RETURNS INT
            BEGIN
                DECLARE Siswa INT;
                SELECT COUNT(*) INTO Siswa FROM siswa;
                RETURN Siswa;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountAngkatan');
        DB::unprepared('
            CREATE FUNCTION CountAngkatan() RETURNS INT
            BEGIN
                DECLARE Angkatan INT;
                SELECT COUNT(*) INTO Angkatan FROM angkatan;
                RETURN Angkatan;
            END
        ');
        DB::unprepared('DROP FUNCTION IF EXISTS CalculateTotalValue');
        DB::unprepared('
            CREATE FUNCTION CalculateTotalValue(nama_sumber_dana ENUM("Dana-BOS", "Dana-BOPD", "Dana-Komite", "Dana-SPP"))
            RETURNS VARCHAR(255)
            BEGIN
                DECLARE total_value VARCHAR(255);

                SELECT COALESCE(SUM(dana_sumber_dana), 0) INTO total_value
                FROM sumber_dana
                WHERE sumber_dana.nama_sumber_dana = nama_sumber_dana;

                RETURN total_value;
            END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CalculateTotalDanaSumberDana');
        DB::unprepared('
            CREATE FUNCTION CalculateTotalDanaSumberDana()
            RETURNS VARCHAR(255)
            BEGIN
                DECLARE total_value VARCHAR(255);

                SELECT COALESCE(SUM(dana_sumber_dana), 0) INTO total_value
                FROM sumber_dana;

                RETURN total_value;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
