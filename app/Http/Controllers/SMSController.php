<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use App\Models\StatusAbsensi;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Nexmo\Client\Exception\Exception;
use Nexmo\Client\Exception\Server;

class SMSController extends Controller
{
    const NEXMO_API_KEY = "2847817d";
    const NEXMO_API_SECRET = "vtXkaUPQ7ORiLCUj";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = [];
        $siswa = Siswa::all()->where('status',2);
        foreach ($siswa as $val){
            $temp = [];
            $temp['nama'] = $val->nama;
            $temp['telepon'] = $val->telepon;
            $temp['data'] = "Laporan Hasil Absensi Minggu Ini".PHP_EOL."Nama Siswa : {$val->nama}".PHP_EOL;
            $absen = DB::table('absen')
                ->join('status_absensi','absen.status','=','status_absensi.id')
                ->whereRaw('YEARWEEK(absen_buka)=YEARWEEK(NOW())')
                ->where('siswa',$val->id)
                ->selectRaw('status_absensi.status,DATE_FORMAT(absen_buka, "%d-%m-%Y") as date')
                ->get();
            foreach ($absen as $val_absen){
                $temp['data'] .= PHP_EOL."{$val_absen->date} : {$val_absen->status}";
            }
            $temp['data'] .= PHP_EOL.PHP_EOL."Dikirim Pada Tanggal : ".date('Y-m-d');
            array_push($arr,$temp);
        }
        foreach ($arr as $val){
            $telepon = $this->escapeFirstNumber($val['telepon']);
            if(!empty($telepon)){
                $this->smsGateway($telepon, "SD Wonokususmo Jaya" , $val['data']);
            }
        }
    }


    public function escapeFirstNumber($number){
        $first = substr($number, 0, 1);
        $last = substr($number, 1);
        if (intval($first) == 0) {
            $first = "62";
        }
        return $first.$last;
    }

    public function smsGateway($to, $from, $text){
        $basic  = new \Nexmo\Client\Credentials\Basic(self::NEXMO_API_KEY, self::NEXMO_API_SECRET);
        $client = new \Nexmo\Client($basic);
        try {
            $message = $client->message()->send([
                'to'   => $to,
                'from'   => $from,
                'text'   => $text
            ]);
            return $message;
        } catch (\Nexmo\Client\Exception\Request $e) {
            return $e;
        } catch (Server $e) {
            return $e;
        } catch (Exception $e) {
            return $e;
        }
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
