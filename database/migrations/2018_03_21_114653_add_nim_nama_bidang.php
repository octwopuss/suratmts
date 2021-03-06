<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNimNamaBidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_1_a', function (Blueprint $table) {
            $table->string('nama');
            $table->string('nim');
            $table->string('bidang_pilihan');
        });

        Schema::table('surat_1_b', function (Blueprint $table) {
            $table->string('nama');
            $table->string('nim');
            $table->string('bidang_pilihan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
