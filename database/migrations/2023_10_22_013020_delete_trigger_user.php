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
    protected $trgName = '';

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName); //
    }
};
