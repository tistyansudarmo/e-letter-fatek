<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratProdiController extends Controller
{
    public function prodi_ti() {
        return view('layouts.surat.prodi-ti', ['prodi_ti' => Surat::where('surats.prodi_id', '=', 1)
        ->join('users as sender', 'surats.sender_id', '=', 'sender.id')
        ->join('surat_user', 'surat_user.surat_id', '=', 'surats.id')
        ->join('users as recipient', 'recipient.id', 'surat_user.user_id')
        ->select('surats.*', 'sender.name as sender_name', 'recipient.name as recipient_name')
        ->get()], ['title' => 'Surat Prodi TI']);
    }
}
