<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaliSiswaReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wali_siswa', function (Blueprint $table) {
            $table->foreign('siswa')->references('id')->on('siswa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kategori')->references('id')->on('kategori_wali')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wali_siswa', function (Blueprint $table) {
            $table->dropForeign('siswa');
            $table->dropForeign('kategori');
        });
    }
}
