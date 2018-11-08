<?php

namespace App\Http\Controllers;

use App\Models\KategoriWali;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\SiswaPindahan;
use App\Models\StatusSiswa;
use App\Models\WaliSiswa;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Milon\Barcode\DNS2D;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use PhpSpec\Exception\Example\ErrorException;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pendaftaran")
            ->with("sekolah", Sekolah::all()->first())
            ->with("kategori_wali", KategoriWali::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $photoName = time().'.'.$request->foto_siswa->getClientOriginalExtension();
            $request->foto_siswa->move(public_path('galeri/foto/siswa'), $photoName);
            $akta = "";
            if(!empty($request->akta_1) && !empty($request->akta_2) && !empty($request->akta_3))
                $akta = $request->akta_1."/".$request->akta_2."/".$request->akta_3;
            $siswa = Siswa::create([
                'nama'=>$request->nama_siswa,
                'nomor_akta_kelahiran'=>$akta,
                'alamat'=>$request->alamat_siswa,
                'telepon'=>$request->telepon,
                'kelas'=>Kelas::all()->where("kelas","1")->first()->id,
                "jenis_kelamin"=>$request->jenis_kelamin_siswa,
                "tempat_lahir"=>$request->tempat_lahir_siswa,
                "tanggal_lahir"=>$request->tanggal_lahir_siswa,
                "kebangsaan"=>$request->kebangsaan_siswa,
                "agama"=>$request->agama_siswa,
                "anak_ke"=>$request->anak_ke,
                "status_anak"=>$request->status_anak,
                "jumlah_saudara"=>$request->jumlah_saudara,
                "siswa_pindahan_baru"=>$request->siswa_pindahan_baru,
                "ukuran_sepatu"=>$request->ukuran_sepatu,
                'status'=>1,
                'foto'=>$photoName,
            ]);
            if ($request->siswa_pindahan_baru == "pindahan"){
                SiswaPindahan::create([
                    "siswa"=> $siswa->id,
                    "nama_sekolah"=>$request->nama_sekolah,
                    "alasan_keluar"=>$request->alasan_keluar,
                    "tanggal_keluar"=>$request->tanggal_keluar,
                    "kelas_pindahan"=>$request->kelas_pindahan
                ]);
            }
            WaliSiswa::create([
                'siswa'=>$siswa->id,
                'nama'=>$request->nama_ayah,
                'alamat'=>$request->alamat_ayah,
                'kategori'=>$request->kategori_ayah,
                "tempat_lahir"=>$request->tempat_lahir_ayah,
                "tanggal_lahir"=>$request->tanggal_lahir_ayah,
                "kebangsaan"=>$request->kebangsaan_ayah,
                "agama"=>$request->agama_ayah,
                "pendidikan_terakhir"=>$request->pendidikan_terakhir_ayah,
                "pekerjaan"=>$request->pekerjaan_ayah
            ]);
            $wali = WaliSiswa::create([
                'siswa'=>$siswa->id,
                'nama'=>$request->nama_ibu,
                'alamat'=>$request->alamat_ibu,
                'kategori'=>$request->kategori_ibu,
                "tempat_lahir"=>$request->tempat_lahir_ibu,
                "tanggal_lahir"=>$request->tanggal_lahir_ibu,
                "kebangsaan"=>$request->kebangsaan_ibu,
                "agama"=>$request->agama_ibu,
                "pendidikan_terakhir"=>$request->pendidikan_terakhir_ibu,
                "pekerjaan"=>$request->pekerjaan_ibu
            ]);
            if ($request->konfirmasi_wali == 'setuju'){
                $wali = WaliSiswa::create([
                    'siswa'=>$siswa->id,
                    'nama'=>$request->nama_wali,
                    'alamat'=>$request->alamat_wali,
                    'kategori'=>$request->kategori_wali,
                    "tempat_lahir"=>$request->tempat_lahir_wali,
                    "tanggal_lahir"=>$request->tanggal_lahir_wali,
                    "kebangsaan"=>$request->kebangsaan_wali,
                    "agama"=>$request->agama_wali,
                    "pendidikan_terakhir"=>$request->pendidikan_terakhir_wali,
                    "pekerjaan"=>$request->pekerjaan_wali
                ]);
            }
        }catch (QueryException $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()]);
        }catch (Exception $e) {
            return response()->json(['status'=>false, 'message'=> $e->getMessage()]);
        }
        if($wali){
            return $this->registerPreview($request, $siswa->id, $photoName);
        }else{
            return response()->json(['status'=>false,"message"=>"Unknown Error"]);
        }
    }

    private function registerPreview($val,$id, $photo = ''){
        if(!empty($val->konfirmasi_wali)){
            $wali = $val->nama_wali;
        } else{
            $wali = $val->nama_ayah;
        }
        $html =
            "<div class=\"container\">"
            ."<br/>"
            ."<div class='text-center'><h4><b>Selamat</b></h4><p>Proses pendaftaran online siswa baru SD Wonokusumo Jaya 127 Surabaya telah berhasil, 
                dengan nama calon siswa {$val->nama_siswa} yang di dampingi oleh wali {$wali}. Silahkan unduh bukti pendaftaran dengan menekan
                tombol cetak di bawah ini :</p></div>"
            ."<br/>"
            .'<div class="text-center"><button type="button" class="btn btn-primary" data-id="'.$id.'" id="download_pdf"><span><i class="fa fa-download"></i> Cetak Bukti</span></button>'
            .'<a href="{{route(\'welcome\')}}"><button type="button" class="btn btn-danger">Selesai</button></a></div>'
            ."<br/>"
            ."<br/>"
            ."</div>";
        return response()->json(['data'=>$html,'status'=>true]);
    }

    public function downloadFile($id)
    {
        $sekolah = Sekolah::all()->first();
        $siswa = Siswa::with('wali')->where('id',$id)->first();
        $ayah = $siswa->getRelation('wali')->where('kategori',1)->first();
        $file_foto = asset('galeri/foto/siswa')."/".$siswa->foto;
        $data =
            "<html>"
            ."<head>"
                ."<link href=\"".asset('theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css')."\" rel=\"stylesheet\">"
            ."</head>"
            ."<body>"
            ."<div class=\"container\">"
                ."<div class='row'>"
                    ."<div class='col-xs-2 col-md-2 col-sm-2'></div>"
                    ."<div class='col-xs-2 col-md-2 col-sm-2 text-center'><img width='120px' src=\"".asset("galeri/foto/logo.jpeg")."\" alt=\"logo_sekolah\"></div>"
                    ."<div class='col-xs-8 col-md-8 col-sm-8 text-center'>"
                    ."<h4><b>YAYASAN PENDIDIKAN “BALAI KUSUMA” SEKOLAH DASAR WONOKUSUMO JAYA No. 127</b></h4>"
                    ."<div>Alamat Kantor  : Wonokusumo Jaya VII / 10   Kode Pos 60153"
                    ."<br>Kecamatan : Semampir - Kota Surabaya  &#9742; (031) 3763997"
                    ."<br>NSB:003962750307803 NSS:104056001041 NPSN:20532821</div>"
                    ."</div>"
                    ."<div class='col-xs-2 col-md-2 col-sm-2'></div>"
                ."</div>"
                ."<hr style=\"border-width: 3px;\">"
                ."<div><h4 class='text-center'><b>Bukti Cetak Pendaftaran Siswa</b></h4></div>"
                ."<br/>"
                ."<div class='row'>"
                    ."<div class='col-md-5 col-sm-5 col-xs-5 col-md-offset-2 col-sm-offset-2 col-xs-offset-2'>"
                        ."<table>"
                            ."<tr>"
                                ."<td class='text-right'><p>Nama Calon Siswa </p></td>"
                                ."<td><p style='padding-right: 5px; padding-left: 5px'> : </p></td>"
                                ."<td><p>{$siswa->nama}</p></td>"
                            ."</tr>"
                            ."<tr>"
                                ."<td class='text-right'><p>Tempat, Tanggal Lahir </P></td>"
                                ."<td><p style='padding-right: 5px; padding-left: 5px'> : </p></td>"
                                ."<td><p>{$siswa->alamat}</p></td>"
                            ."</tr>"
                            ."<tr>"
                                ."<td class='text-right'><p>Jenis Kelamin </p></td>"
                                ."<td><p style='padding-right: 5px; padding-left: 5px'> : </p></td>"
                                ."<td><p>{$siswa->jenis_kelamin}</p></td>"
                            ."</tr>"
                            ."<tr>"
                                ."<td class='text-right'><p>Nama Orang Tua / Wali </p></td>"
                                ."<td><p style='padding-right: 5px; padding-left: 5px'> : </p></td>"
                                ."<td><p>{$ayah->nama}</p></td>"
                            ."</tr>"
                        ."</table>"
                    ."</div>"
                    ."<div class='col-xs-2 col-sm-2 col-md-2 text-center'><img width='100px' title='{$file_foto}' src=\"{$file_foto}\" alt=\"{$file_foto}\"></div>"
                    ."<div class='col-xs-3 col-sm-3 col-md-3 text-center'></div>"
                ."</div>"
                ."<div style='margin-left: 80px;margin-right: 80px; margin-top: 20px'>"
                    ."<p style=\"text-align:justify\">Selamat, proses pendaftaran online siswa baru SD Wonokusumo Jaya 127 Surabaya telah berhasil.</p><br>"
                    ."<div style=\"alignment: right\"></div>"
                    ."<p id=\"saran\">*) Bukti cetak pendaftaran harap dibawa saat daftar ulang.</p>"
                    ."<br/><br/>"
                    ."<div class='row'>"
                        ."<div class='col-xs-3 col-sm-3 col-md-3 text-center'>"
                            ."<p>Mengetahui<br/>Orangtua / Wali</p>"
                            ."<br/><br/><br/>"
                            ."<p>{$ayah->nama}</p>"
                        ."</div>"
                        ."<div class='col-xs-6 col-sm-6 col-md-6 text-right'>"
                            .'<img src="data:image/png;base64,'.DNS2D::getBarcodePNG(route('pendaftaran.lihat',['id'=>$id]), "QRCODE") .'" alt="barcode"/>'
                        ."</div>"
                    ."</div>"
                ."</div>"
            ."</div>"
            ."</body>"
            ."</html>";
        try {
            self::makePDF($data, "Bukti Pendaftaran");
        } catch (MpdfException $e) {
        }
    }

    public function dataPreview($id){
        $siswa = Siswa::with('wali')->where('id',$id)->first();
        $ayah = $siswa->getRelation('wali')->where('kategori',1)->first();
        $ibu = $siswa->getRelation('wali')->where('kategori',2)->first();
        $preview =
            "<table width=\"800\" border=\"0\" align=\"center\" cellpadding=\"5\">"
            ."<tr>"
            ."<td colspan=\"2\">Info Siswa<hr/></td>"
            ."</tr>"
            ."<tr>"
            ."<td width=\"50%\" align=\"right\">Nama Lengkap:</td>"
            ."<td>{$siswa->nama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Jenis Kelamin:</td>"
            ."<td>".$siswa->jenis_kelamin."</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Alamat:</td>"
            ."<td>{$siswa->alamat}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Telepon:</td>"
            ."<td>{$siswa->telepon}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Tanggal Lahir:</td>"
            ."<td>".date('d M Y',strtotime($siswa->tanggal_lahir))."</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Agama:</td>"
            ."<td>{$siswa->agama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Kewarganegaraan:</td>"
            ."<td>{$siswa->kebangsaan}</td>"
            ."</tr>"
            ."<tr>"
            ."<td colspan=\"2\">Informasi Ayah Siswa<hr/></td>"
            ."</tr>"
            ."<tr>"
            ."<td width=\"50%\" align=\"right\">Nama Lengkap:</td>"
            ."<td>{$ayah->nama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Alamat:</td>"
            ."<td>{$ayah->alamat}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Tanggal Lahir:</td>"
            ."<td>".date('d M Y',strtotime($ayah->tanggal_lahir))."</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Agama:</td>"
            ."<td>{$ayah->agama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Kewarganegaraan:</td>"
            ."<td>{$ayah->kebangsaan}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\" valign=\"top\">Pekerjaan:</td>"
            ."<td>{$ayah->pekerjaan}</td>"
            ."</tr>"
            ."<tr>"
            ."<td colspan=\"2\">Informasi Ibu Siswa<hr/></td>"
            ."</tr>"
            ."<tr>"
            ."<td width=\"50%\" align=\"right\">Nama Lengkap:</td>"
            ."<td>{$ibu->nama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Alamat:</td>"
            ."<td>{$ibu->alamat}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Tanggal Lahir:</td>"
            ."<td>".date('d M Y',strtotime($ibu->tanggal_lahir))."</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Agama:</td>"
            ."<td>{$ibu->agama}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\">Kewarganegaraan:</td>"
            ."<td>{$ibu->kebangsaan}</td>"
            ."</tr>"
            ."<tr>"
            ."<td align=\"right\" valign=\"top\">Pekerjaan:</td>"
            ."<td>{$ibu->pekerjaan}</td>"
            ."</tr>"
            ."</table>";
        echo $preview;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
