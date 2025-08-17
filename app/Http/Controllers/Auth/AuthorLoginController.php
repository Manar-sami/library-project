<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        $author = Author::where('email', $credentials['email'])->first();

        if ($author && Hash::check($credentials['password'], $author->password)) {
            Auth::login($author);
            return redirect()->route('books.create')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('author.login')->with('success', 'تم تسجيل الخروج');
    }
}
