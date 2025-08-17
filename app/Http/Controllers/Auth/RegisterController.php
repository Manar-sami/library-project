<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'code'     => 'required|string|max:50|unique:authors,code',
            'email'    => 'required|string|email|max:255|unique:authors,email',
            'country'  => 'required|string|max:100',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        Author::create($data);

        return redirect()->route('author.login')->with('success', 'تم إنشاء الحساب بنجاح، يرجى تسجيل الدخول');
    }
}

