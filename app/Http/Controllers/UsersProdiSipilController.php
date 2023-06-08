<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersProdiSipilController extends Controller
{
    public function view() {

        $user = DB::table('users')->join('levels', 'users.level_id', '=', 'levels.id')->select('users.*', 'levels.jabatan')->where('prodi_id', '=', 3)->get();
        return view('layouts.users-prodi.prodi-sipil', ['users' => $user], ['title' => 'Prodi Teknik Sipil']);
    }
}
