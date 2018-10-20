<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nomor_pelajar",20)->nullable();
            $table->string("nomor_akta_kelahiran", 11)->nullable();
            $table->string("nama",20);
            $table->string("alamat",20);
            $table->string("jenis_kelamin",1);
            $table->string("tempat_lahir", 30);
            $table->string("telepon",20)->nullable();
            $table->date("tanggal_lahir");
            $table->string("kebangsaan", 3);
            $table->string("agama", 100);
            $table->integer("anak_ke")->nullable();
            $table->string("status_anak",100)->nullable();
            $table->integer("jumlah_saudara")->nullable();
            $table->string("siswa_pindahan_baru",100)->nullable();
            $table->integer("ukuran_sepatu")->nullable();

            $table->integer('kelas')->unsigned();
            $table->integer("status")->unsigned();//Aktif atau Pasif
            $table->text("foto")->nullable();//Aktif atau Pasif
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
        Schema::dropIfExists('siswa');
    }
}
