<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Level;

class UsersProdiTiController extends Controller
{
    public function view()
    {
        $users = DB::table('users')
                    ->join('levels', 'users.level_id', '=', 'levels.id')
                    ->select('users.*', 'levels.jabatan')
                    ->where('prodi_id', '=', 1)
                    ->get();
        return view('layouts.users-prodi.prodi-ti', ['users' => $users], ['title' => 'Prodi Teknik Informatika']);
    }

}
