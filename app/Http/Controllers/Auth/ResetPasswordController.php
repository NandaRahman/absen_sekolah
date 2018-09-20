<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user_id = Auth::user()->id;
        return view('auth/reset')->with('id',$user_id);
    }

    public function resetPassword(Request $request){
        $validate = $this->passwordValidation($request);
        if ($validate === true){
            DB::table('user')->where('id','=',$request->id)->update([
                'password'=>Hash::make($request->password),
                'token_first_login'=>''
            ]);
            return redirect()->route('home');
        }else{
            return $validate;
        }
    }

    public function  passwordValidation($request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return true;
    }

}
