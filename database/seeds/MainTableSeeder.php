<?php

use App\Models\KategoriWali;
use App\Models\StatusAbsensi;
use App\Models\StatusSiswa;
use Illuminate\Database\Seeder;

class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusSiswa::create([
            'status' => "baru",
            'keterangan' => "Siswa yang baru saja mendaftar dan menunggu untuk saat daftar ulang.",
        ]);
        StatusSiswa::create([
            'status' => "aktif",
            'keterangan' => "Status siswa aktif yang sedang dalam proses belajar mengajar.",
        ]);
        StatusSiswa::create([
            'status' => "pasif",
            'keterangan' => "Status siswa bagi yang telah tidak aktif dikarenakan sudah lulus.",
        ]);
        StatusSiswa::create([
            'status' => "keluar",
            'keterangan' => "Status siswa yang sudah tidak aktif dikarenakan keluar ataupun dikeluarkan darisekolah.",
        ]);

        KategoriWali::create([
            'nama' => "Ayah",
            'keterangan' => "Bisa ayah kandung ataupun ayah angkat.",
        ]);
        KategoriWali::create([
            'nama' => "Ibu",
            'keterangan' => "Bisa ibu kandung ataupun ibu angkat.",
        ]);
        KategoriWali::create([
            'nama' => "Lainnya",
            'keterangan' => "Wali Siswa Umum (Saudara, Kakek, Nenek, Dll)",
        ]);

        StatusAbsensi::create([
            'status' => "Alpha",
            'keterangan' => "",
        ]);
        StatusAbsensi::create([
            'status' => "Hadir",
            'keterangan' => "",
        ]);
        StatusAbsensi::create([
            'status' => "Sakit",
            'keterangan' => "",
        ]);
        StatusAbsensi::create([
            'status' => "Ijin",
            'keterangan' => "",
        ]);
    }
}
