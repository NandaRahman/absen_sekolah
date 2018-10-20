<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class HomeController extends Controller
{
    use EntrustUserTrait; // add this trait to your user model

    var $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')){
            return redirect()->route('admin.absensi');
        }else{
            return redirect()->route('user.laporan');
        }
    }

    public function welcome()
    {
        return view('user/home');
    }


}
