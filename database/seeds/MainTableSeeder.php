<?php

use App\Models\KategoriWali;
use App\Models\Sekolah;
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


        Sekolah::create([
            'nama' => "SD WONOKUSUMO JAYA SURABAYA",
            'didirikan'=>"1976-01-02",
            'visi_misi'=>"
VISI :
MEMBENTUK SISWA YANG BERPRESTASI, TERAMPIL, DAN BERAKHLAK MULIA

MISI:
1.	MELAKSANAKAN PEMBINAAN DALAM BIDANG KEAGAMAAN
2.	MELAKSANAKAN PEMBELAJARAN AKTIF, KREATIF DAN MENYENANGKAN
3.	MELAKSANAKAN PEMBINAAN PENGEMBANGAN DIRI MELALUI KEGIATAN EKSTRAKULIKULER
4.	MELAKSANAKAN PENGEMBANGGAN KARAKTER MULIA
5.	MELAKSANAKAN PEMBINAAN IPTEK

TUJUAN :
1.	MEMPERSIAPKAN PESERTA DIDIK YANG MEMILIKI LANDASAN AGAMA YANG KUAT
2.	MEMPERSIAPKAN PESERTA DIDIK YANG BERPRESTASI DALAM BIDANG AKADEMIK AGAR MAMPU BERSANG DENGAN BAIK
3.	MENINGKATKAN KECAKAPAN DALAM BIDANG KETERAMPILAN, PENDIDIKAN KEPRIBADIAN, DAN PEMBIASAAN HIDUP BERSIH
4.	MEMPERSIAPKAN ANAK DDIK YANG BERKAKHLAK MULIA DALAM TUTUR KATA DAN TINGKAH LAKU, AGAR MAMPU MENERAPKAN PADA LINGKUNGAN
5.	MEMPERSIAPAKAN PESERTA DIDIK YANG SIAP MENGHADAPI KEHIDUPAN YANG TELAH MAJU DAN BERKEMBANG
",
            'deskripsi'=>null,
            'akreditasi'=>"C",
            'penerimaan_siswa'=>20,
            'buka_penerimaan'=>1,
            'nss'=>"104056001041",
            'npsn'=>"20532821",
            'kepala_sekolah'=>"Ambarsari Listyaningrum, S.Pd.",
            'alamat'=>"Jl. WONOKUSUMO JAYA VII No. 10 SURABAYA",
            'email'=>"sdwonokusumojaya@gmail.com",
            'yayasan'=>"Yayasan Pendidikan Balai Kusuma"
        ]);
    }
}
