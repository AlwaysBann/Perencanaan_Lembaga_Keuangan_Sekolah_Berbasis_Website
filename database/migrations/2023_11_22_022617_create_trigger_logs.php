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
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER INSERT ON tbl_user
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;
        DECLARE nameuser VARCHAR(200);

        SELECT username INTO nameuser FROM tbl_user WHERE id_user = NEW.id_user;
        
        SELECT id_user INTO user_id FROM tbl_user WHERE id_user = NEW.id_user;
        INSERT INTO logs (logs) VALUES (CONCAT("Akun User telah ditambahkan oleh super admin dengan nomor id: ", user_id, ". dan nama ", nameuser));
    END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER INSERT ON pengajuan
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;

        SELECT id_user INTO user_id FROM tbl_user WHERE id_user = NEW.id_pengajuan;
        
        INSERT INTO logs (logs) VALUES (CONCAT("Pengajuan telah ditambahkan oleh peminta dengan nomor id: ", user_id, ". dan nama ", NEW.pembuat));
    END'
        );
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared('
    CREATE TRIGGER ' . $this->trgName . ' AFTER INSERT ON tagihan
    FOR EACH ROW
    BEGIN
        DECLARE jenis_tagihan_name VARCHAR(255);

        SELECT nama_jenis_tagihan INTO jenis_tagihan_name FROM JenisTagihan WHERE id_jenis_tagihan = NEW.id_jenis_tagihan;

        INSERT INTO logs (logs) VALUES (
            CONCAT("Tagihan dengan ID ", NEW.id_tagihan, " telah ditambahkan dengan jenis tagihan: ", jenis_tagihan_name, ".")
        );
    END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_user');
    }
};
