<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register()
    {
        return view('auth.signup');
    }
    public function processLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->pass;
        $check = DB::table('users')
            ->where('email', $email)
            ->first();

        if ($check && HASH::check($password, $check->password)) {
            $check->isLogin = 'login';
            $check = (array)$check;
            session($check);

            return redirect('/');
        }

        return back()->with('gagal', 'Please check your auth status or your input!');
    }
    public function processRegister(Request $request)
    {
        return $request->all();
    }
}
