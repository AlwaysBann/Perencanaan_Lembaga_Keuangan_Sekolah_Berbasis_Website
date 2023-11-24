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
        Schema::create('realisasi', function (Blueprint $table) {
            $table->integer('id_realisasi')->autoIncrement();
            $table->integer('id_ruangan', false);
            $table->integer('id_perencanaan', false);
            $table->string('nama_realisasi', 200);
            $table->string('jumlah_dana_realisasi');
            $table->string('bukti_realisasi');

            $table->foreign('id_ruangan')->on('ruangan')
            ->references('id_ruangan')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_perencanaan')->on('perencanaan')
            ->references('id_perencanaan')->onDelete('cascade')->onUpdate('cascade');
        });
        DB::unprepared('CREATE TRIGGER tambah_realisasi AFTER INSERT ON realisasi FOR EACH ROW BEGIN INSERT INTO logs_realisasi(logs) VALUES (concat
        (\'Data Realisasi \', NEW.nama_realisasi, \' telah ditambahkan pada \' , NOW())); END;');
        DB::unprepared('CREATE TRIGGER edit_realisasi AFTER UPDATE ON realisasi FOR EACH ROW BEGIN INSERT INTO logs_realisasi(logs) VALUES (concat
        (\'Data Realisasi \', OLD.nama_realisasi, \' telah diperbarui pada \' , NOW())); END;');
        DB::unprepared('CREATE TRIGGER hapus_realisasi AFTER DELETE ON realisasi FOR EACH ROW BEGIN INSERT INTO logs_realisasi(logs) VALUES (concat
        (\'Data Realisasi \', OLD.nama_realisasi, \' telah dihapus pada \',  NOW())); END;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasi');
    }
};
