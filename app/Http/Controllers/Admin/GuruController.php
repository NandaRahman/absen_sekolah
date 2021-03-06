<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Role;
use App\Models\User;
use Dirape\Token\Token;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
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
        return view('user/admin/guru')
            ->with('guru',Guru::with('user')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($this->userValidation($request)){
            $token_first_login = (new Token())->Unique('user', 'token_first_login', 5);
            $user = User::create([
                'nama'=>$request->nama,
                'email'=>$request->email,
                'password'=> Hash::make($token_first_login),
                'token_first_login'=>$token_first_login,
            ]);
            $user->attachRole(Role::find(2));
            $user->save();
            $photoName = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('galeri/foto/guru'), $photoName);
            Guru::create([
                'user'=>$user->id,
                'foto'=>$photoName,
            ]+$request->all());
        }else {
            Session::flash('status', 'Gagal, Pastikan email dan nomor pegawai tidak ada yang sama');
        }
        return back();
    }


    public function  userValidation($request){
        $validator = Validator::make($request->all(), [
            'email'=> 'required|unique:user',
        ]);
        if ($validator->fails()) {
            return false;
        }
        return true;
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
        User::where('id', $request->user_id)->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
        ]);
        Guru::where('id', $request->id)->update([
            'nomor_pegawai'=>$request->nomor_pegawai,
            'telepon'=>$request->telepon,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'tahun_mengajar'=>$request->tahun_mengajar,
            'status_kepegawaian'=>$request->status_kepegawaian,
            'pendidikan_terakhir'=>$request->pendidikan_terakhir
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
        $destinationPath = public_path('galeri/foto/guru');
        $image = Guru::all()->where("user", $id)->first()->foto;
        File::delete($destinationPath.'/'.$image);
        User::where("id", $id)->delete();
        return back();
    }
}
