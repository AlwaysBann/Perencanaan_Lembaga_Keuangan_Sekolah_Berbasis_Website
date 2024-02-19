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
    protected $trgName = 'trgUserUpdate';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trgTblUpdate');
        DB::unprepared(
            'CREATE TRIGGER trgTblUpdate AFTER UPDATE ON tbl_user
    FOR EACH ROW
    BEGIN
        DECLARE user_id INT;
        DECLARE perubahan VARCHAR(255);
        DECLARE update_message TEXT;
        
        -- Ambil ID user yang diupdate
        SELECT id_user INTO user_id FROM tbl_user WHERE id_user = NEW.id_user;

        -- Inisialisasi pesan log
        SET update_message = CONCAT("User dengan nomor id: ", user_id, " telah diupdate. Perubahan:");

        -- Periksa perubahan pada username
        IF OLD.username != NEW.username THEN
            SET perubahan = CONCAT("Username dari ", (SELECT username FROM tbl_user WHERE id_user = OLD.id_user), " ke ", (SELECT username FROM tbl_user WHERE id_user = NEW.id_user));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;
        
        -- Periksa perubahan pada password
        IF OLD.password != NEW.password THEN
            SET update_message = CONCAT(update_message, " password dari ", " kepo ", " ke ", "kepo");
        END IF;
        
        -- Periksa perubahan pada role
        IF OLD.role != NEW.role THEN
        SET perubahan = CONCAT("Role dari ", (SELECT role FROM tbl_user WHERE id_user = OLD.id_user), " ke ", (SELECT role FROM tbl_user WHERE id_user = NEW.id_user));
        SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada foto profil
        IF OLD.foto_profil != NEW.foto_profil THEN
        SET perubahan = CONCAT("Foto_profil dari ", (SELECT foto_profil FROM tbl_user WHERE id_user = OLD.id_user), " ke ", (SELECT foto_profil FROM tbl_user WHERE id_user = NEW.id_user));
        SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Insert pesan log ke dalam tabel logs
        INSERT INTO logs (logs) VALUES (update_message);
    END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgPengajuanUpdate');
        DB::unprepared(
            'CREATE TRIGGER trgPengajuanUpdate AFTER UPDATE ON pengajuan
    FOR EACH ROW
    BEGIN
        DECLARE pengajuan_id INT;
        DECLARE perubahan VARCHAR(255);
        DECLARE update_message TEXT;
        
        -- Ambil ID pengajuan yang diupdate
        SELECT id_pengajuan INTO pengajuan_id FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan;

        -- Inisialisasi pesan log
        SET update_message = CONCAT("Pengajuan dengan nomor id: ", pengajuan_id, " telah diupdate. Perubahan:");

        -- Periksa perubahan pada nama_pengaju
        IF OLD.nama_pengaju != NEW.nama_pengaju THEN
            SET perubahan = CONCAT("Nama Pengaju dari ", (SELECT OLD.nama_pengaju FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.nama_pengaju FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada nama_pengajuan
        IF OLD.nama_pengajuan != NEW.nama_pengajuan THEN
            SET perubahan = CONCAT("Nama Pengajuan dari ", (SELECT OLD.nama_pengajuan FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.nama_pengajuan FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada tujuan_pengajuan
        IF OLD.tujuan_pengajuan != NEW.tujuan_pengajuan THEN
            SET perubahan = CONCAT("Tujuan Pengajuan dari ", (SELECT OLD.tujuan_pengajuan FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.tujuan_pengajuan FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada nama_item
        IF OLD.nama_item != NEW.nama_item THEN
            SET perubahan = CONCAT("Nama Item dari ", (SELECT OLD.nama_item FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.nama_item FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada jumlah_item
        IF OLD.jumlah_item != NEW.jumlah_item THEN
            SET perubahan = CONCAT("Jumlah Item dari ", (SELECT OLD.jumlah_item FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.jumlah_item FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada spesifikasi_item
        IF OLD.spesifikasi_item != NEW.spesifikasi_item THEN
            SET perubahan = CONCAT("Spesifikasi Item dari ", (SELECT OLD.spesifikasi_item FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.spesifikasi_item FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada harga_satuan
        IF OLD.harga_satuan != NEW.harga_satuan THEN
            SET perubahan = CONCAT("Harga Satuan dari ", (SELECT OLD.harga_satuan FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.harga_satuan FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada jenis_item
        IF OLD.jenis_item != NEW.jenis_item THEN
            SET perubahan = CONCAT("Jenis Item dari ", (SELECT OLD.jenis_item FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.jenis_item FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada id_ruangan
        IF OLD.id_ruangan != NEW.id_ruangan THEN
            SET perubahan = CONCAT("Ruangan dari ", (SELECT nama_ruangan FROM ruangan WHERE id_ruangan = OLD.id_ruangan), " ke ", (SELECT nama_ruangan FROM ruangan WHERE id_ruangan = NEW.id_ruangan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada waktu_pengajuan
        IF OLD.waktu_pengajuan != NEW.waktu_pengajuan THEN
            SET perubahan = CONCAT("Waktu Pengajuan dari ", (SELECT OLD.waktu_pengajuan FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.waktu_pengajuan FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Periksa perubahan pada gambar_item
        IF OLD.gambar_item != NEW.gambar_item THEN
            SET perubahan = CONCAT("Gambar Item dari ", (SELECT OLD.gambar_item FROM pengajuan WHERE id_pengajuan = OLD.id_pengajuan), " ke ", (SELECT NEW.gambar_item FROM pengajuan WHERE id_pengajuan = NEW.id_pengajuan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        -- Insert pesan log ke dalam tabel logs
        INSERT INTO logs (logs) VALUES (update_message);
    END'
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgUpdateTagihan');
        DB::unprepared(
            'CREATE TRIGGER trgUpdateTagihan AFTER UPDATE ON tagihan
    FOR EACH ROW
    BEGIN
        DECLARE tagihan_id INT;
        DECLARE perubahan VARCHAR(255);
        DECLARE update_message TEXT;

        SELECT id_tagihan INTO tagihan_id FROM tagihan WHERE id_tagihan = NEW.id_tagihan;

        SET update_message = CONCAT("Tagihan dengan nomor ID: ", tagihan_id, " telah diupdate. Perubahan:");

        IF OLD.id_jenis_tagihan != NEW.id_jenis_tagihan THEN
            SET perubahan = CONCAT("Jenis Tagihan dari ", (SELECT nama_jenis_tagihan FROM JenisTagihan WHERE id_jenis_tagihan = OLD.id_jenis_tagihan), " ke ", (SELECT nama_jenis_tagihan FROM JenisTagihan WHERE id_jenis_tagihan = NEW.id_jenis_tagihan));
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        IF OLD.jumlah_tagihan != NEW.jumlah_tagihan THEN
            SET perubahan = CONCAT("Jumlah Tagihan dari ", OLD.jumlah_tagihan, " ke ", NEW.jumlah_tagihan);
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        IF OLD.tanggal_tagihan != NEW.tanggal_tagihan THEN
            SET perubahan = CONCAT("Tanggal Tagihan dari ", OLD.tanggal_tagihan, " ke ", NEW.tanggal_tagihan);
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        INSERT INTO logs (logs) VALUES (update_message);
    END
        '
        );

        DB::unprepared('DROP TRIGGER IF EXISTS trgUpdatePerencanaan');
        DB::unprepared(
            'CREATE TRIGGER trgUpdatePerencanaan AFTER UPDATE ON perencanaan
    FOR EACH ROW
    BEGIN
        DECLARE perencanaan_id INT;
        DECLARE perubahan VARCHAR(255);
        DECLARE update_message TEXT;

        SELECT id_perencanaan INTO perencanaan_id FROM perencanaan WHERE id_perencanaan = NEW.id_perencanaan;

        SET update_message = CONCAT("Perencanaan dengan nomor ID: ", perencanaan_id, " telah diupdate. Perubahan:");

        IF OLD.nama_penanggung_jawab != NEW.nama_penanggung_jawab THEN
            SET perubahan = CONCAT("Nama Penanggung Jawab dari ", OLD.nama_penanggung_jawab, " ke ", NEW.nama_penanggung_jawab);
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        IF OLD.nama_perencanaan != NEW.nama_perencanaan THEN
            SET perubahan = CONCAT("Nama Perencanaan dari ", OLD.nama_perencanaan, " ke ", NEW.nama_perencanaan);
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        IF OLD.waktu_realisasi != NEW.waktu_realisasi THEN
            SET perubahan = CONCAT("Waktu Realisasi dari ", OLD.waktu_realisasi, " ke ", NEW.waktu_realisasi);
            SET update_message = CONCAT(update_message, " ", perubahan);
        END IF;

        INSERT INTO logs (logs) VALUES (update_message);
    END
'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
