<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainAuthController extends Controller
{
    public function showLogin() {
        return view('Auth.main_login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

              return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة',
        ]);
    }
}
