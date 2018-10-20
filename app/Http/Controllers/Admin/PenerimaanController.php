<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\StatusSiswa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PenerimaanController extends Controller
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
        return view('user/admin/penerimaan')
            ->with('siswa',Siswa::with('wali','status', 'kelas')->where("status",'=',$status->id)->get())
            ->with('kelas',Kelas::all())
            ->with('sekolah',Sekolah::all()->first())
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
    public function update(Request $request)
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
    public function accept($id)
    {
        $status = StatusSiswa::all()->where("status",'aktif')->first();
        Siswa::where("id",$id)->update([
            'status'=>$status->id,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where("id", $id)->delete();
        return back();
    }
}
