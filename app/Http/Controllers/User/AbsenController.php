<?php

namespace App\Http\Controllers\User;

use App\Models\Absen;
use App\Models\Guru;
use App\Models\StatusAbsensi;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
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
        $absen = $this->check();
        if ($absen)
            return view('user/guru/absensi')
                ->with('absen',$absen)
                ->with('status',StatusAbsensi::all());
        else
            return view('user/guru/absensi')->with('already',$this->already());
    }



    public function open(){
        $guru = Guru::with('kelas')->where('user', Auth::user()->id)->first();
        $siswa = $guru->kelas()->getResults()->siswa()->getResults()->where('status',2);
        foreach ($siswa as $val)
            Absen::create([
                'siswa'=>$val->id,
                'pengajar'=>$guru->id,
                'status'=>1,
                'absen_buka'=>date("Y-m-d H:i:s"),
                'absen_tutup'=>date("Y-m-d H:i:s",strtotime("23:00:00")),
            ]);
        return back();
    }


    public function close(){
        $guru = Guru::with('kelas')->where('user', Auth::user()->id)->first();
        Absen::where("pengajar",$guru->id)
            ->whereRaw('DATE_FORMAT(absen_buka, "%Y-%m-%d")='."'".date('Y-m-d')."'")
            ->update(['absen_tutup'=>date("Y-m-d H:i:s", strtotime('-1 minute'))]);
        return back();
    }

    public function updateAbsen(Request $request){
        try{
            Absen::where("id",$request->id)
                ->update(['status'=>$request->status]);
            return response()->json([
                "status"=>true,
                "message"=>"Update Berhasil",
            ]);
        }catch (QueryException $e){
            return response()->json(['status'=>false, 'message'=> $e->getMessage()]);
        }catch (Exception $e) {
            return response()->json(['status'=>false, 'message'=> $e->getMessage()]);
        }
    }

    public function check(){
        $absen = Absen::with('siswa')->whereRaw('DATE_FORMAT(absen_buka, "%Y-%m-%d")='."'".date('Y-m-d')."'")
            ->whereRaw('DATE_FORMAT(absen_buka, "%H:%i:%s")<='."'".date('H:i:s')."'")
            ->whereRaw('DATE_FORMAT(absen_tutup, "%H:%i:%s")>='."'".date('H:i:s')."'")
            ->get();
        if(!empty(sizeof($absen))){
            return $absen;
        }else{
            return false;
        }
    }

    public function already(){
        $absen = Absen::with('siswa')
            ->whereRaw('DATE_FORMAT(absen_buka, "%Y-%m-%d")='."'".date('Y-m-d')."'")
            ->get();
        if(!empty(sizeof($absen))){
            return true;
        }else{
            return false;
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
