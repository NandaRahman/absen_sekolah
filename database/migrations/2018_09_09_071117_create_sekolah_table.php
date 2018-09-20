<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama');
            $table->date('didirikan')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('akreditasi', 1)->nullable();
            $table->integer('penerimaan_siswa')->nullable();
            $table->integer('buka_penerimaan')->nullable();
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
        Schema::drop('sekolah');
    }
}
