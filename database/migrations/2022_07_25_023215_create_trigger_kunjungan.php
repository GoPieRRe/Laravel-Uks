<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER obat_keluar AFTER INSERT ON tb_kunjungan FOR EACH ROW
                        BEGIN 
                            UPDATE tb_obat SET stok = stok - NEW.stok WHERE nama_obat = NEW.nama_obat;
                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_kunjungan');
    }
}
