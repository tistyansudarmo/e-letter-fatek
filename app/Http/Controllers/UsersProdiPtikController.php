<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersProdiPtikController extends Controller
{
    public function view() {

        if(auth()->user()->prodi_id != 2 && auth()->user()->jabatan->nama != 'Admin') {
            abort(403);
        }

        $user = DB::table('users')
        ->join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
        ->select('users.*', 'jabatans.nama')
        ->where('prodi_id', '=', 2)
        ->get();
        return view('layouts.users-prodi.prodi-ptik', ['users' => $user], ['title' => 'Prodi PTIK']);
    }
}

