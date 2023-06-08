<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Level;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    public function RegistrasiView() {
        return view('layouts.register.register', ['prodi' => Prodi::all()], ['level' => Level::all()], ['title' => 'Registrasi']);
    }
    

    public function store(Request $request) {
        $validate = $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users', 'min:8'],
            'email' => ['required',  'unique:users', 'email:dns'],
            'nip' => ['required', 'unique:users'],
            'no_hp' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'password' => ['min:8', 'required'],
            'prodi_id' => 'required',
            'level_id' => 'required'
        ]);
        
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('/');

    }
}
