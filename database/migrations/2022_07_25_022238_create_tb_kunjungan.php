<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->string('NIS')->index();
            $table->date('tgl_kunjungan');
            $table->text('keperluan');
            $table->string('nama_obat')->index()->nullable();
            $table->string('stok')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kunjungan');
    }
}
