<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surat;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function count() {

        $count_user = DB::table('users')->where('users.prodi_id', '=', auth()->user()->prodi_id)->count();

        $count_surat_keluar = DB::table('surats')->where('surats.sender_id', '=', auth()->user()->id)->count();

        $count_surat_masuk = DB::table('surat_user')->where('surat_user.user_id', '=', auth()->user()->id)->count();

        $all_surat_prodi_ti = DB::table('surats')->join('prodis', 'prodis.id', '=', 'surats.prodi_id')->where('surats.prodi_id', '=', 1)->count();

        $all_surat_prodi_ptik = DB::table('surats')->join('prodis', 'prodis.id', '=', 'surats.prodi_id')->where('surats.prodi_id', '=', 2)->count();

        $all_surat_prodi_sipil = DB::table('surats')->join('prodis', 'prodis.id', '=', 'surats.prodi_id')->where('surats.prodi_id', '=', 3)->count();


        return view('layouts.dashboard.dashboard', 
        ['count1' => $count_user, 'count2' => $count_surat_keluar, 'count3' => $count_surat_masuk, 'prodi_ti' => $all_surat_prodi_ti, 'prodi_ptik' => $all_surat_prodi_ptik, 'prodi_sipil' => $all_surat_prodi_sipil], ['title' => 'Dashboard']);
    }

   

}
