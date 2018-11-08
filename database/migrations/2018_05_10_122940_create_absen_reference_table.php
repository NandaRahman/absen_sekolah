<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absen', function (Blueprint $table) {
            $table->foreign('siswa')->references('id')->on('siswa');
            $table->foreign('pengajar')->references('id')->on('guru');
            $table->foreign('status')->references('id')->on('status_absensi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absen', function (Blueprint $table) {
            $table->dropForeign('siswa');
            $table->dropForeign('pengajar');
            $table->dropForeign('status');
        });
    }
}
