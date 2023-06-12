<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Level;
use Illuminate\Validation\Rule;

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

     public function update(Request $request, User $user) {
        $validate = $request->validate([
            'name' => ['required'],
            'username' => ['required',  Rule::unique('users')->ignore($user->id)],
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'nip' => ['required', Rule::unique('users')->ignore($user->id)],
            'no_hp' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'password' => '',
            'prodi_id' => 'required',
            'level_id' => 'required'
        ]);
        
        $validate['password'] = bcrypt($validate['password']);
        
        $user->update($validate);

        return redirect('/users-prodi-ti');

    }

}
