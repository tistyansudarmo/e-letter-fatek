<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Jabatan;
use Illuminate\Validation\Rule;

class UsersProdiTiController extends Controller
{
    public function view()
    {
        if(auth()->user()->prodi_id != 1 && auth()->user()->jabatan->nama != 'Admin') {
            abort(403);
        }

         $users = User::join('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
            ->join('prodis', 'prodis.id', '=', 'users.prodi_id')
            ->select('users.*', 'jabatans.nama')
            ->where('prodi_id', 1)
            ->get();

        $prodi = Prodi::all();
        $role = Role::all();
        $jabatan = Jabatan::all();
        return view('layouts.users-prodi.prodi-ti', ['users' => $users, 'prodi' => $prodi, 'jabatan' => $jabatan, 'role' => $role], ['title' => 'Prodi Teknik Informatika']);
    }


    public function destroy($id) {
        
        User::where('id', $id)->delete();
        return redirect('/users-prodi-ti');
    }

     public function update(Request $request, User $user) {
        $validate = $request->validate([
            'name' => ['required'],
            'username' => ['required',  Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email:dns', Rule::unique('users')->ignore($user->id)],
            'nip' => ['required', Rule::unique('users')->ignore($user->id)],
            'no_hp' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'password' => '',
            'prodi_id' => 'required',
            'jabatan_id' => 'required'
        ]);

        if($request->input('password')) {
            $validate['password'] = bcrypt($validate['password']);
        }else{
            $validate['password'] = $user->password;
        }

        $user->syncRoles([$request->input('role')]);
        $user->assignRole($request->input('role'));
        $user->update($validate);
        

        return redirect('users-prodi-ti');

    }

}
