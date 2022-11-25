<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE VIEW view_kunjungan AS(SELECT tb_kunjungan.* ,tb_pengunjung.nama, tb_pengunjung.rayon, tb_pengunjung.rombel
                        FROM tb_kunjungan 
                        INNER JOIN tb_pengunjung ON tb_pengunjung.NIS = tb_kunjungan.NIS);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_kunjungan');
    }
}
