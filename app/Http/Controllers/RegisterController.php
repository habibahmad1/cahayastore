<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Daftar"
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Generate username dari name dengan angka random 3 digit
        $validateData['username'] = str_replace(' ', '', $validateData['name']) . rand(100, 999);

        // Hash password sebelum menyimpan
        $validateData['password'] = bcrypt($validateData['password']);

        $validateData['is_admin'] = false;


        // Simpan data ke database
        User::create($validateData);

        return redirect('/')->with('success', 'Buat Akun Berhasil!');
    }
}
