<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Jabatan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        User::create([
            'name' => ucwords('admin'),
            'username' => 'admin',
            'email' => 'sudarmoian@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 123456789,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'jabatan_id' => 6
        ]);

        User::create([
            'name' => ucwords('medi tinambunan'),
            'username' => 'meditinambunan',
            'email' => 'meditinambunan@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 12345678,
            'alamat' => 'Medan',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'jabatan_id' => 1
        ]);

        User::create([
            'name' => ucwords('tistyan sudarmo'),
            'username' => 'tistyans',
            'email' => 'tistyansudarmo@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 1234567891,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'jabatan_id' => 2
        ]);

        User::create([
            'name' => ucwords('ferrent tacoh'),
            'username' => 'ferrenttacoh',
            'email' => 'ferrenttacoh@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 123456021,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'jabatan_id' => 3
        ]);

        Prodi::create([
            'prodi' => 'Teknik Informatika'
        ]);
        Prodi::create([
            'prodi' => 'PTIK'
        ]);
        Prodi::create([
            'prodi' => 'Teknik Sipil'
        ]);

        Jabatan::create([
            'nama' => 'Dosen'
        ]);
        Jabatan::create([
            'nama' => 'Pegawai'
        ]);
        Jabatan::create([
            'nama' => 'Pimpro'
        ]);
        Jabatan::create([
            'nama' => 'Dekan'
        ]);
        Jabatan::create([
            'nama' => 'Rektor'
        ]);
        Jabatan::create([
            'nama' => 'Admin'
        ]);


        $adminRole = Role::create(['name' => 'admin']);
        $pegawaiRole = Role::create(['name' => 'pegawai']);
        $dosenRole = Role::create(['name' => 'dosen']);
        $dekanRole = Role::create(['name' => 'dekan']);
        $pimproRole = Role::create(['name' => 'pimpro']);
        $rektorRole = Role::create(['name' => 'rektor']);

        $addUserPermission = Permission::create(['name' => 'create user']);
        $updateUserPermission = Permission::create(['name' => 'update user']);
        $deleteUserPermission = Permission::create(['name' => 'delete user']);
        $createSuratPermission = Permission::create(['name' => 'create surat']);
        $updateSuratPermission = Permission::create(['name' => 'update surat']);
        $deleteSuratPermission = Permission::create(['name' => 'delete surat']);
        $viewSuratPermission = Permission::create(['name' => 'view surat']);
        
        $adminRole->syncPermissions([$addUserPermission, $updateUserPermission, $deleteUserPermission]);

        $userAdmin = User::where('jabatan_id', '=', 6)->get();

        foreach ($userAdmin as $admin) {
            $admin->assignRole('admin');
        }        
    }
}
