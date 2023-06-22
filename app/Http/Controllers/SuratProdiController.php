<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\User;

class SuratProdiController extends Controller
{
    public function prodi_ti() {
        if(!auth()->user()->hasRole('admin')) {
            abort(403);
        }
        return view('layouts.surat.prodi-ti', ['prodi_ti' => Surat::where('surats.prodi_id', '=', 1)
        ->join('users as sender', 'surats.sender_id', '=', 'sender.id')
        ->join('surat_user', 'surat_user.surat_id', '=', 'surats.id')
        ->join('users as recipient', 'recipient.id', 'surat_user.user_id')
        ->select('surats.*', 'sender.name as sender_name', 'recipient.name as recipient_name')
        ->get()], ['title' => 'Surat Prodi TI']);
    }

    public function prodi_ptik() {
        if(!auth()->user()->hasRole('admin')) {
            abort(403);
        }
        return view('layouts.surat.prodi-ptik', ['prodi_ptik' => Surat::where('surats.prodi_id', '=', 2)
        ->join('users as sender', 'surats.sender_id', '=', 'sender.id')
        ->join('surat_user', 'surat_user.surat_id', '=', 'surats.id')
        ->join('users as recipient', 'recipient.id', 'surat_user.user_id')
        ->select('surats.*', 'sender.name as sender_name', 'recipient.name as recipient_name')
        ->get()], ['title' => 'Surat Prodi TI']);
    }

    

   
}
