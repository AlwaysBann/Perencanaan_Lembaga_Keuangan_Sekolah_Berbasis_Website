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
        DB::unprepared('DROP VIEW IF EXISTS view_tagihan');
        DB::unprepared(
    "CREATE VIEW view_tagihan AS
            SELECT
                t.id_tagihan,
                t.jumlah_tagihan,
                t.tanggal_tagihan,
                jt.id_jenis_tagihan,
                jt.nama_jenis_tagihan
            FROM tagihan t
            JOIN JenisTagihan jt ON t.id_jenis_tagihan = jt.id_jenis_tagihan
        ");

        DB::unprepared('DROP VIEW IF EXISTS view_jenis_tagihan');
        DB::unprepared(
        "CREATE VIEW view_jenis_tagihan AS
        SELECT
            id_jenis_tagihan,
            nama_jenis_tagihan
        FROM JenisTagihan
        ");

        DB::unprepared('DROP VIEW IF EXISTS view_jurusan');
        DB::unprepared(
"CREATE VIEW view_jurusan AS
            SELECT
                id_jurusan,
                nama_jurusan
            FROM jurusan
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
