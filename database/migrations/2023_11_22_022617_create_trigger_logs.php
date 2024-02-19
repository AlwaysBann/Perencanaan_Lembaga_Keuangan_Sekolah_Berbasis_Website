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
    protected $trgName = 'trgUserInsert';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trgTblInsert');
        DB::unprepared(
            'CREATE TRIGGER trgTblInsert AFTER INSERT ON tbl_user
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;
        DECLARE nameuser VARCHAR(200);

        SELECT username INTO nameuser FROM tbl_user WHERE id_user = NEW.id_user;
        
        SELECT id_user INTO user_id FROM tbl_user WHERE id_user = NEW.id_user;
        INSERT INTO logs (logs) VALUES (CONCAT("Akun User telah ditambahkan oleh super admin dengan nomor id: ", user_id, ". dan nama ", nameuser));
    END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgPengajuanInsert');
        DB::unprepared(
            'CREATE TRIGGER trgPengajuanInsert AFTER INSERT ON pengajuan
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;

        SELECT id_user INTO user_id FROM tbl_user WHERE id_user = NEW.id_pengajuan;
        
        INSERT INTO logs (logs) VALUES (CONCAT("Pengajuan telah ditambahkan oleh peminta dengan nomor id: ", user_id, ". dan nama ", NEW.pembuat));
    END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgTagihanInsert');
        DB::unprepared(
            'CREATE TRIGGER trgTagihanInsert AFTER INSERT ON tagihan
    FOR EACH ROW
    BEGIN
        DECLARE jenis_tagihan_name VARCHAR(255);

        SELECT nama_jenis_tagihan INTO jenis_tagihan_name FROM JenisTagihan WHERE id_jenis_tagihan = NEW.id_jenis_tagihan;

        INSERT INTO logs (logs) VALUES (
            CONCAT("Tagihan dengan ID ", NEW.id_tagihan, " telah ditambahkan dengan jenis tagihan: ", jenis_tagihan_name, ".")
        );
    END
        '
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgPerencanaanInsert');
        DB::unprepared(
            'CREATE TRIGGER trgPerencanaanInsert AFTER INSERT ON perencanaan
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;
        DECLARE nameuser VARCHAR(200);

        SELECT nama_penanggung_jawab INTO nameuser FROM perencanaan WHERE id_perencanaan = NEW.id_perencanaan;

        SELECT id_perencanaan INTO user_id FROM perencanaan WHERE id_perencanaan = NEW.id_perencanaan;
        INSERT INTO logs (logs) VALUES (CONCAT("Perencanaan ditambahkan oleh ", nameuser, " dengan nomor id: ", user_id));
    END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_user');
    }
};
