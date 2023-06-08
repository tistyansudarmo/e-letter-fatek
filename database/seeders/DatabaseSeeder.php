<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Level;

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
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'sudarmoian@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 123456789,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'level_id' => 6
        ]);

        User::create([
            'name' => 'medi tinambunan',
            'username' => 'meditinambunan',
            'email' => 'meditinambunan@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 12345678,
            'alamat' => 'Medan',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'level_id' => 1
        ]);

        User::create([
            'name' => 'tistyan sudarmo',
            'username' => 'tistyans',
            'email' => 'tistyansudarmo@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 1234567891,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'level_id' => 2
        ]);

        User::create([
            'name' => 'ferrent tacoh',
            'username' => 'ferrenttacoh',
            'email' => 'ferrenttacoh@gmail.com',
            'password' => bcrypt(12345678),
            'nip' => 123456021,
            'alamat' => 'Manado',
            'ttl' => '2000-04-12',
            'no_hp' => '12345678',
            'prodi_id' => 1,
            'level_id' => 2
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

        Level::create([
            'jabatan' => 'Dosen'
        ]);
        Level::create([
            'jabatan' => 'Pegawai'
        ]);
        Level::create([
            'jabatan' => 'Pimpro'
        ]);
        Level::create([
            'jabatan' => 'Dekan'
        ]);
        Level::create([
            'jabatan' => 'Rektor'
        ]);
        Level::create([
            'jabatan' => 'Admin'
        ]);
      
    }
}
