<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user")->unsigned();
            $table->string("telepon",16);
            $table->string("nomor_pegawai",30)->nullable();
            $table->string("alamat",20);
            $table->string("tempat_lahir", 30);
            $table->date("tanggal_lahir");
            $table->date("tahun_mengajar");
            $table->string("status_kepegawaian");
            $table->string("pendidikan_terakhir");
            $table->text("foto");
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
        Schema::dropIfExists('guru');
    }
}
