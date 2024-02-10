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
        DB::unprepared('DROP TRIGGER IF EXISTS insertTagihan');
        DB::unprepared('
        CREATE TRIGGER insertTagihan
        AFTER INSERT ON tagihan
        FOR EACH ROW
        BEGIN
            UPDATE siswa
            SET id_tagihan = NEW.id_tagihan
            WHERE id_siswa = NEW.id_tagihan;
        END;
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS updateTagihan');
        DB::unprepared('
        CREATE TRIGGER updateTagihan
        AFTER INSERT ON pembayaran
        FOR EACH ROW
        BEGIN
            UPDATE tagihan
            SET status = "Bayar"
            WHERE id_tagihan = NEW.id_tagihan;
        END
        ');

        DB::unprepared('DROP TRIGGER IF EXISTS updateSiswaOnBayar');
        DB::unprepared('
            CREATE TRIGGER updateSiswaOnBayar
            AFTER UPDATE ON tagihan
            FOR EACH ROW
            BEGIN
                IF NEW.status = "Bayar" AND OLD.status != "Bayar" THEN
                    UPDATE siswa
                    SET id_tagihan = NULL
                    WHERE id_siswa = NEW.id_tagihan;
                END IF;
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
