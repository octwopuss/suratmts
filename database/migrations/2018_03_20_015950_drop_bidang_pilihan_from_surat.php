<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBidangPilihanFromSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_1_a', function (Blueprint $table) {
            $table->dropColumn(['bidang_pilihan', 'nama', 'nim']);
        });

        Schema::table('surat_1_b', function (Blueprint $table) {
            $table->dropColumn(['bidang_pilihan', 'nama', 'nim']);
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
