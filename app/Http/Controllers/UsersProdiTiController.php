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
                    ->join('prodis', 'prodis.id', '=', 'users.prodi_id')
                    ->select('users.*', 'levels.jabatan')
                    ->where('prodi_id', '=', 1)
                    ->get();

        $prodi = Prodi::all();
        
        $level = Level::all();
        return view('layouts.users-prodi.prodi-ti', ['users' => $users, 'prodi' => $prodi, 'level' => $level], ['title' => 'Prodi Teknik Informatika']);
    }


    public function destroy($id) {
        
        User::where('id', $id)->delete();
        return redirect('/users-prodi-ti');
    }

    

}
