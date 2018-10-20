<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaliSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa')->unsigned();
            $table->integer('kategori')->unsigned();

            $table->string("nama",20);
            $table->string("alamat",20);
            $table->string("tempat_lahir", 30);
            $table->date("tanggal_lahir");
            $table->string("kebangsaan", 3);
            $table->string("agama", 100);
            $table->string("pendidikan_terakhir", 100);
            $table->string("pekerjaan", 100);

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
        Schema::dropIfExists('wali_siswa');
    }
}
