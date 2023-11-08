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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->integer('id_ruangan',false,);
            $table->string('nama_ruangan', 50);
        });
        DB::unprepared('DROP Procedure IF EXISTS CreateDataRuangan');
        DB::unprepared(
        "CREATE PROCEDURE CreateDataRuangan(ruangan VARCHAR(255))
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT '00000';
            BEGIN

            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO ruangan(nama_ruangan) VALUES (ruangan);

            IF pesan_error != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
        END;"
        );
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
