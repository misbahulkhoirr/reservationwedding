<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }
    public function auth(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login gagal !!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // request()->session()->invalidate(); jika tidak ingin memamakai (Request $request)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
