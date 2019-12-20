<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Logincontroller extends Controller
{
    public function login() {
        return view('admin.login');
    }

    public function loginPost(LoginRequest $request) {
        $infoUser = DB::table('users')->get();
        $detail = DB::table('users')
            ->where('username',$request->input('username'))
            ->get();
        if (Hash::check($request->input('password'), $detail[0]->password )){
            $request->session()->put('session', $detail[0]->name);
            alert()->success('Login', 'Thanh Cong');
            return redirect('home');
        }
        alert()->error('Announce','Tài khoản mật khẩu không chính xác');
        return redirect('/posts/login');
    }

    public function logOut(Request $request){
        $request->session()->forget('session');
        alert()->success('Logout','Thanh Cong');
        return redirect('home');
    }
}
