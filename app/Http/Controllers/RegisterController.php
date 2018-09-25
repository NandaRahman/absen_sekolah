<?php

namespace App\Http\Controllers;

use App\Models\KategoriWali;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\StatusSiswa;
use App\Models\WaliSiswa;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use PhpSpec\Exception\Example\ErrorException;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pendaftaran")->with("kategori_wali", KategoriWali::all());
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
            $akta = null;
            if(!empty($request->akta_1) && !empty($request->akta_2) && !empty($request->akta_3))
                $akta = $request->akta_1."/".$request->akta_2."/".$request->akta_3;
            $siswa = Siswa::create([
                'nama'=>$request->nama_siswa,
                'nomor_akta_kelahiran'=>$akta,
                'alamat'=>$request->alamat_siswa,
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
            $wali = WaliSiswa::create([
                'siswa'=>$siswa->id,
                'nama'=>$request->nama_ayah,
                'alamat'=>$request->alamat_ayah,
                'telepon'=>$request->nomor_ayah,
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
                'telepon'=>$request->nomor_ibu,
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
                    'telepon'=>$request->nomor_wali,
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
            return $this->registerPreview($request);
        }else{
            return response()->json(['status'=>false,"message"=>"Unknown Error"]);
        }
    }
    private function registerPreview($val){
        if(!empty($val->konfirmasi_wali)){
            $nomor = $val->nomor_wali;
            $wali = $val->nama_wali;
        } else{
            $nomor = $val->nomor_ayah;
            $wali = $val->nama_ayah;
        }
        $html = "<table class=\"table table-borderless\">"
            ."<tr>"
            ."<th colspan=\"4\" class=\"text-center\">BUKTI PENDAFTARAN<br>SD Wonokusumo</th>"
            ."</tr>"
            ."<tr>"
            ."<td rowspan=\"4\" class=\"align-top\" width=\"200px\"><img src=\"#\" class=\"text-center\" width=\"200px\" alt=\"Foto\"></td>"
            ."<td class=\"align-middle\">Nama</td>"
            ."<td class=\"align-middle\">:</td>"
            ."<td class=\"align-middle\">".$val->nama_siswa."</td>"
            ."</tr>"
            ."<tr>"
            ."<td class=\"align-middle\">Alamat</td>"
            ."<td class=\"align-middle\">:</td>"
            ."<td class=\"align-middle\">".$val->alamat_siswa."</td>"
            ."</tr>"
            ."<tr>"
            ."<td class=\"align-middle\">Telp. Wali</td>"."<td class=\"align-middle\">:</td>"."<td class=\"align-middle\">".$nomor."</td>"
            ."</tr>"
            ."<tr>"
            ."<td class=\"align-middle\">Orangtua/Wali</td>"
            ."<td class=\"align-middle\">:</td>"
            ."<td class=\"align-middle\">". $wali ."</td>"
            ."</tr>"
            ."<tr>"
            ."<td colspan=\"2\" class=\"text-center\"><br>Mengtahui<br>Orangtua/Wali<br><br><br></td>"
            ."</tr>"
            ."<tr>"
            ."<td colspan=\"3\" class=\"text-center\">".$wali."</td>"
            ."<td colspan=\"1\" class=\"align-top\">*) Berikan lembar ini saat daftar ulang sebagai bukti</td>"
            ."</tr>"
            ."</table>";
        return response()->json(['data'=>$html,'status'=>true]);
    }

    /**
     * Store a newly created resource in pdf.
     *
     * @throws \Mpdf\MpdfException
     */
    public function pdf(Request $request)
    {
        $data = "<html>"
            ."<head>"
            ."<link href=\"".asset('public/theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css')."\" rel=\"stylesheet\">"
            ."</head>"
            ."<body>"
            ."<div class='container'>"
            .$request->data
            ."</div>"
            ."</body>"
            ."</html>";
        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($data);
        $pdf->Output('Bukti Pendaftaran.pdf', \Mpdf\Output\Destination::DOWNLOAD);
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
