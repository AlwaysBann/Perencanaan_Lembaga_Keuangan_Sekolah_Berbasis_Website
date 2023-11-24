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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->integer('id_pengajuan')->autoIncrement();
            $table->string('nama_pengaju');
            $table->string("nama_pengajuan",200);
            $table->string('tujuan_pengajuan', 200);
            $table->integer('id_ruangan', false);
            $table->string('nama_item');
            $table->integer('jumlah_item');
            $table->string('spesifikasi_item');
            $table->string('harga_satuan');        
            $table->enum('jenis_item', ['Jasa', 'Benda']);
            $table->date('waktu_pengajuan');
            $table->string('pembuat');
            $table->enum('status', ['setuju', 'tidak'])->default('tidak');
            $table->text('gambar_item');

            $table->foreign('id_ruangan')->on('ruangan')
            ->references('id_ruangan')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::unprepared('DROP Procedure IF EXISTS CreateDataPengajuan');
        DB::unprepared(
        "CREATE PROCEDURE CreateDataPengajuan (
            IN p_nama_pengaju VARCHAR(255),
            IN p_nama_pengajuan VARCHAR(200),
            IN p_tujuan_pengajuan VARCHAR(200),
            IN p_id_ruangan INT,
            IN p_nama_item VARCHAR(255),
            IN p_jumlah_item INT,
            IN p_spesifikasi_item VARCHAR(255),
            IN p_harga_satuan VARCHAR(255),
            IN p_jenis_item VARCHAR(50),
            IN p_gambar_item VARCHAR(255),
            IN p_pembuat VARCHAR(255)
        )
        BEGIN
            DECLARE waktu TIMESTAMP;
            DECLARE pesan_error CHAR(5) DEFAULT '00000';
            BEGIN

            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            
            SET waktu = NOW();

            INSERT INTO pengajuan (
                nama_pengaju,
                nama_pengajuan,
                tujuan_pengajuan,
                id_ruangan,
                nama_item,
                jumlah_item,
                spesifikasi_item,
                harga_satuan,
                jenis_item,
                gambar_item,
                pembuat,
                waktu_pengajuan
            ) VALUES (
                p_nama_pengaju,
                p_nama_pengajuan,
                p_tujuan_pengajuan,
                p_id_ruangan,
                p_nama_item,
                p_jumlah_item,
                p_spesifikasi_item,
                p_harga_satuan,
                p_jenis_item,
                p_gambar_item,
                p_pembuat,
                waktu
            );

            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
            
        END"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
