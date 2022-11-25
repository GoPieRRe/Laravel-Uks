<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerPengunjung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER update_rombel AFTER UPDATE ON tb_rombel FOR EACH ROW
                        BEGIN
                            UPDATE tb_pengunjung SET rombel = NEW.jurusan WHERE rombel = OLD.jurusan;
                        END');
        DB::unprepared('CREATE TRIGGER update_rayon AFTER UPDATE ON tb_rayon FOR EACH ROW
                        BEGIN
                            UPDATE tb_pengunjung SET rayon = NEW.nama_rayon WHERE rayon = OLD.nama_rayon;
                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_pengunjung');
    }
}
