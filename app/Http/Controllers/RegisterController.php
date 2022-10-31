<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|max:255',
            'no_telp' => 'required|max:13',
            'alamat' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_id'] = 2;
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil ! Silahkan login');
    }
}
