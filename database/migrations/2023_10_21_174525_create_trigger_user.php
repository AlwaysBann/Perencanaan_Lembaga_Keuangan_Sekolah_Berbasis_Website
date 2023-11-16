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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trigger_user');
    }
};
