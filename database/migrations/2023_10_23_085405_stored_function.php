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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
