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

class SiswaController extends Controller
{
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
            'nomor_pelajar'=>$request->siswa->nomor_pelajar,
            'nomor_akta_kelahiran'=>$request->siswa->akta,
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
                'telepon'=>$wali->nomor,
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
}
