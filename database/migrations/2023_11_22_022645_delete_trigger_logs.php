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
    protected $trgName = 'trgDelete';

    public function up()
    {
        // DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        // DB::unprepared(
        //     'CREATE TRIGGER ' . $this->trgName . ' AFTER DELETE ON tbl_user
        //     FOR EACH ROW
        //     BEGIN
        //         DECLARE user_name VARCHAR(200);
        //         SELECT username INTO user_name FROM tbl_user WHERE id_user = OLD.id_user;

        //         INSERT INTO logs (logs) VALUES (CONCAT("Super Admin telah menghapus  Akun user  nomor id: ", OLD.id_user, ". bernama ", user_name));
        //     END'
        // );

        DB::unprepared('DROP TRIGGER IF EXISTS trgPengajuanDelete');
        DB::unprepared(
            'CREATE TRIGGER trgPengajuanDelete AFTER DELETE ON pengajuan
            FOR EACH ROW
            BEGIN

                INSERT INTO logs (logs) VALUES (CONCAT("Peminta telah menghapus Pengajuan  nomor id: ", OLD.id_pengajuan, ". bernama ", OLD.pembuat));

            END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgTagihanDelete');
        DB::unprepared(
            'CREATE TRIGGER trgTagihanDelete AFTER DELETE ON tagihan
            FOR EACH ROW
            BEGIN
                
                INSERT INTO logs (logs) VALUES (CONCAT("Tagihan dengan nomor ID: ", OLD.id_tagihan, " telah dihapus."));
            END
        '
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgPerencanaanDelete');
        DB::unprepared(
            'CREATE TRIGGER trgPerencanaanDelete AFTER DELETE ON perencanaan
    FOR EACH ROW
    BEGIN

        INSERT INTO logs (logs) VALUES (CONCAT("Penanggung Jawab ", OLD.nama_penanggung_jawab, " telah menghapus Perencanaan nomor id: ", OLD.id_perencanaan, " dengan nama ", OLD.nama_perencanaan));

    END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName); //
    }
};;
