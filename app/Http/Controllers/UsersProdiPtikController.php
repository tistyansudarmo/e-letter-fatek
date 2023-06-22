<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersProdiPtikController extends Controller
{
    public function view() {

        if(auth()->user()->prodi_id != 2 && auth()->user()->jabatan->nama != 'Admin') {
            abort(403);
        }

         $users = User::join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
            ->join('prodis', 'prodis.id', '=', 'users.prodi_id')
            ->select('users.*', 'jabatans.nama')
            ->where('prodi_id', 2)
            ->get();
        return view('layouts.users-prodi.prodi-ptik', ['users' => $users, 'title' => 'Prodi PTIK']);
    }
}

