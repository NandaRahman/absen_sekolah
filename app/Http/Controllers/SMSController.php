<?php

namespace App\Http\Controllers;

use Twilio;
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
            $alpha = [];
            $sakit = [];
            $izin = [];
            $temp['nama'] = $val->nama;
            $temp['telepon'] = $val->telepon;
            $temp['data'] = "Laporan hasil absensi minggu ini tanggal ".date('d M Y')." atas nama siswa yang bernama {$val->nama} ";
            $absen = DB::table('absen')
                ->join('status_absensi','absen.status','=','status_absensi.id')
                ->whereRaw('YEARWEEK(absen_buka)=YEARWEEK(NOW())')
                ->where('siswa',$val->id)
                ->selectRaw('status_absensi.status,DATE_FORMAT(absen_buka, "%Y-%m-%d") as date')
                ->get();
            foreach ($absen as $val_absen){
                if ($val_absen->status == "Alpha"){
                    $day = $this->get_day(date("w",strtotime($val_absen->date)));
                    array_push($alpha,$day);
                }
                if ($val_absen->status == "Izin"){
                    $day = $this->get_day(date("w",strtotime($val_absen->date)));
                    array_push($izin,$day);
                }
                if ($val_absen->status == "Sakit"){
                    $day = $this->get_day(date("w",strtotime($val_absen->date)));
                    array_push($sakit,$day);
                }
            }
            if (!empty($alpha)){
                $temp['data'] .= "telah alpha sebanyak ".sizeof($alpha)." pada hari ".implode(", ",$alpha)." ";
            }
            if (!empty($izin) || !empty($sakit)){
                if (!empty($alpha)) $temp['data'] .= " serta ";
                $temp['data'] .= "telah izin ataupun sakit sebanyak ".sizeof($izin)+sizeof($sakit)." pada hari ".implode(", ",$izin).", ".implode(", ",$sakit);
            }
            $temp['data'] .= ". Demikian pemberitahuan dari sekolah.";
            array_push($arr,$temp);
        }
        $result = [];
        foreach ($arr as $val){
            $telepon = $this->escapeFirstNumber($val['telepon']);
            if(!empty($telepon)){
                $res = $this->sendMessageTwilio($telepon, "SD Wonokususmo Jaya" , (string)$val['data']);
                array_push($result,$res);
            }
        }
        dd($result);
    }

    public function get_day($day){
        switch ($day){
            case 0: return "Minggu";
            case 1: return "Senin";
            case 2: return "Selasa";
            case 3: return "Rabu";
            case 4: return "Kamis";
            case 5: return "Jum'at";
            case 6: return "Sabtu";
            default : return false;
        }
    }

    public function escapeFirstNumber($number){
        $first = substr($number, 0, 1);
        $last = substr($number, 1);
        if (intval($first) == 0) {
            $first = "+62";
        }
        return $first.$last;
    }

    public function sendMessageNexmo($to, $from, $text){
        $basic  = new \Nexmo\Client\Credentials\Basic(self::NEXMO_API_KEY, self::NEXMO_API_SECRET);
        $client = new \Nexmo\Client($basic);
        try {
            $message = $client->message()->send([
                'to'   => $to,
                'from'   => $from,
                'text'   => "{$text}"
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

    public function sendMessageTwilio($to, $from, $text){
        Twilio::message($to, $text);
        return true;
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
