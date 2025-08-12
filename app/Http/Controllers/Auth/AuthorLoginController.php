<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:author')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authors.author-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'code' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('author')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
             return redirect()->route('author.dashboard');
        }

        return back()->withErrors([
            'code' => 'بيانات الدخول غير صحيحة.',
        ])->onlyInput('code');
    }

    public function logout(Request $request)
    {
        Auth::guard('author')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/author/login');
    }



}
