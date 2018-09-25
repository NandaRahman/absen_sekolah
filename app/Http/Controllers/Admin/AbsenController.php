<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absen;
use App\Models\Guru;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/admin/absensi');
    }



    public function tabel(Request $request){
        $absen = Absen::whereRaw('DATE_FORMAT(absen_buka, "%Y-%m-%d")=?',[date('Y-m-d', $request->data/1000)])->get();
        $table = "
                <div id=\"kelas\" class=\"col-lg-4\"></div>
                <table class=\"table table-primary table-stripped\" id='table'>
                    <thead>
                        <tr>
                            <td>no</td>
                            <td>nama</td>
                            <th>kelas</th>
                            <td>status</td>
                            <th hidden>kelas</th>
                        </tr>
                    </thead>
                    <tbody>";
        $i=1;
        foreach ($absen as $val){
            $table .= "                        
                        <tr>
                            <td>$i</td>
                            <td>".$val->siswa()->first()->nama."</td>
                            <td>".$val->pengajar()->getResults()->kelas()->first()->keterangan."</td>
                            <td>".$val->status()->first()->status."</td>
                            <td hidden>".$val->pengajar()->getResults()->kelas()->first()->kelas."</td>
                        </tr>";
            $i++;
        }
        $table .= "      
                    <tbody>
                </table>";
        echo $table;
    }

    public function grafik()
    {
        $absen = Absen::selectRaw(
                'DAY(absen_buka), absen_buka, COUNT(*) AS total,
                SUM(CASE WHEN (status=1) THEN 1 ELSE 0 END) AS alpha,
                SUM(CASE WHEN (status=2) THEN 1 ELSE 0 END) AS hadir,
                SUM(CASE WHEN (status=3) THEN 1 ELSE 0 END) AS sakit,
                SUM(CASE WHEN (status=4) THEN 1 ELSE 0 END) AS ijin')
            ->groupBy('DAY(absen_buka)')
            ->get();
        return response()->json([
            'alpha'=>[$this->getAlpha($absen)],
            'ijin'=>[$this->getIjin($absen)],
            'hadir'=>[$this->getHadir($absen)],
            'sakit'=>[$this->getSakit($absen)],
        ]);
    }


    private function getAlpha($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->alpha]);
        }
        return $result;
    }

    private function getIjin($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->ijin]);
        }
        return $result;
    }

    private function getHadir($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->hadir]);
        }
        return $result;
    }

    private function getSakit($data){
        $result = [];
        foreach ($data as $val){
            array_push($result, [strtotime($val->absen_buka)*1000,(int)$val->sakit]);
        }
        return $result;
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
