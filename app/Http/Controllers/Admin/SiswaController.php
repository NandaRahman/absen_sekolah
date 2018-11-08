<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\StatusSiswa;
use App\Models\WaliSiswa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Mpdf\MpdfException;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusSiswa::all()->where("status",'baru')->first();
        return view('user/admin/siswa')
            ->with('siswa',Siswa::with('wali','status', 'kelas')->where("status",'<>',$status->id)->get())
            ->with('kelas',Kelas::all())
            ->with('status',StatusSiswa::where("id",'<>',$status->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function editKelas(Request $request)
    {
//        dd($request->id);
        $data = [];
        if(!empty($request->kelas))
        $data = $data + ['kelas'=>$request->kelas];
        if(!empty($request->status))
        $data = $data + ['status'=>$request->status];
        Siswa::whereIn("id",$request->id)->update($data);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request = json_decode(json_encode($request->all()));
        Siswa::where("id",$request->siswa->id)->update([
            'nama'=>$request->siswa->nama,
            'telepon'=>$request->siswa->telepon,
            'nomor_akta_kelahiran'=>$request->siswa->nomor_akta_kelahiran,
            'alamat'=>$request->siswa->alamat,
            "jenis_kelamin"=>$request->siswa->jenis_kelamin,
            "tempat_lahir"=>$request->siswa->tempat_lahir,
            "tanggal_lahir"=>$request->siswa->tanggal_lahir,
            "kebangsaan"=>$request->siswa->kebangsaan,
            "agama"=>$request->siswa->agama,
            "anak_ke"=>$request->siswa->anak_ke,
            "status_anak"=>$request->siswa->status,
            "jumlah_saudara"=>$request->siswa->jumlah_saudara,
            "siswa_pindahan_baru"=>$request->siswa->siswa_pindahan_baru,
            "ukuran_sepatu"=>$request->siswa->ukuran_sepatu,
        ]);
        foreach ($request->wali as $wali){
            WaliSiswa::where("id",$wali->id)->update([
                'nama'=>$wali->nama,
                'alamat'=>$wali->alamat,
                "tempat_lahir"=>$wali->tempat_lahir,
                "tanggal_lahir"=>$wali->tanggal_lahir,
                "kebangsaan"=>$wali->kebangsaan,
                "agama"=>$wali->agama,
                "pendidikan_terakhir"=>$wali->pendidikan_terakhir,
                "pekerjaan"=>$wali->pekerjaan
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $destinationPath = public_path('galeri/foto/siswa');
        $image = Siswa::all()->where("id", $id)->first()->foto;
        File::delete($destinationPath.'/'.$image);
        Siswa::where("id", $id)->delete();
        return back();
    }

    public function get_pdf(Request $request){
        $siswa = Siswa::with('wali')->where('id',$request->id)->first();
        $ayah = $siswa->getRelation('wali')->where('kategori',1)->first();
        $ibu = $siswa->getRelation('wali')->where('kategori',2)->first();
        $data =
            "<html>"
            ."<body>"
            ."<table width=\"800\" border=\"0\" align=\"center\" cellpadding=\"5\">"
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
            ."</table>"
            ."</body>"
            ."</html>";
        try {
            self::makePDF($data, $siswa->nama);
        } catch (MpdfException $e) {
        }

    }
}
