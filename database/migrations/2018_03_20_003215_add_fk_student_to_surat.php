<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkStudentToSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_1_a', function (Blueprint $table) {   
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('student');
        });

        Schema::table('surat_1_b', function (Blueprint $table) {  
            $table->integer('student_id')->unsigned()->nullable(); 
            $table->foreign('student_id')->references('id')->on('student');
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
