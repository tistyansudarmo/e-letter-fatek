<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersProdiPtikController extends Controller
{
    public function view() {

        if(auth()->user()->prodi_id != 2) {
            abort(403);
        }

        $user = DB::table('users')
        ->join('levels', 'users.level_id', '=', 'levels.id')
        ->select('users.*', 'levels.jabatan')
        ->where('prodi_id', '=', 2)
        ->get();
        return view('layouts.users-prodi.prodi-ptik', ['users' => $user], ['title' => 'Prodi PTIK']);
    }
}
