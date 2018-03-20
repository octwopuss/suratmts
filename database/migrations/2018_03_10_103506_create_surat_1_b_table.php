<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurat1BTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_1_b', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bidang_pilihan');
            $table->string('alamat_rumah');
            $table->string('telepon');
            $table->string('instansi');
            $table->string('alamat_instansi');
            $table->string('telp_instansi');
            $table->string('keperluan_data');
            $table->string('instansi_tujuan');
            $table->string('alamat_tujuan');            
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
        Schema::dropIfExists('surat_1_b');
    }
}
