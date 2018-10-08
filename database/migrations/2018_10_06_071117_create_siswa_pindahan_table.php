<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSiswaPindahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_pindahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa');
            $table->string('nama_sekolah')->nullable();
            $table->string('alasan_keluar')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('kelas_pindahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('siswa_pindahan');
    }
}
