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
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER UPDATE ON tbl_user
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

        -- Insert pesan log ke dalam tabel logs
        INSERT INTO logs (logs) VALUES (update_message);
    END'
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