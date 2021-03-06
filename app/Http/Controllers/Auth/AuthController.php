<?php

namespace App\Http\Controllers\Auth;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function authenticated(Request $request, User $user){
        //put your thing in here
        if ($user->hasRole("user")){
            $guru = Guru::where('user',$user->id)->first();
            $kelas = Kelas::where('wali_kelas',$guru->id)->get();
            if (sizeof($kelas)<1){
                $request->session()->flush();
                return redirect()->back()->withErrors(['req'=>'Guru harus memiliki kelas agar bisa login']);
            }
        }
        if($user->hasRole("user") && $user->token_first_login != null){
            return redirect()->route('user.password_reset');
        }
        return redirect()->intended($this->redirectPath());
    }
}
