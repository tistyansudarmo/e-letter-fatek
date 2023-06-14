<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Surat;
use App\Models\User;
use App\Models\SuratUser;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Validation\Rule;

class SuratController extends Controller
{
    public function index() {

        return view('layouts.surat.surat-keluar', ['title' => 'Surat Keluar', 'surat' => DB::table('surats')
        ->join('surat_user', 'surats.id', '=', 'surat_user.surat_id')
        ->join('users', 'surat_user.user_id', '=', 'users.id')
        ->select('surats.*', 'users.name', 'surat_user.user_id', 'surat_user.surat_id')
        ->where('surats.sender_id', '=', auth()->user()->id)
        ->orderByDesc('surats.id')
        ->get()]);
   
    }


    public function index2() {

        return view('layouts.surat.surat-masuk', ['title' => 'Surat Masuk', 'surat' => DB::table('surats')
        ->join('surat_user', 'surats.id', '=', 'surat_user.surat_id')
        ->join('users', 'surats.sender_id', '=', 'users.id')
        ->select('surats.*', 'users.name')
        ->where('surat_user.user_id', '=', auth()->user()->id)
        ->orderByDesc('surats.id')
        ->get()]);

    }


    public function create(){

        return view('layouts.surat.create', ['users' => User::all()],['title' => 'Buat Surat']);
    }


    public function store(Request $request) {
         $validate = $request->validate([
            'title' => 'required',
            'no_surat' => ['required', 'unique:surats', 'not_regex:/\//'],
            'logo_surat' => 'required',
            'content_surat' => 'required',
            'ttd_surat' => 'required',
            'logo_surat' => ['required', 'mimes:jpeg,jpg,png'],
            'ttd_surat' => ['required', 'mimes:jpeg,jpg,png'],
            'penerima' => ['required', 'array', 'exists:users,id']
        ]);

        $validate['logo_surat'] = $request->file('logo_surat')->store('image-surat');
        $validate['ttd_surat'] = $request->file('ttd_surat')->store('image-surat');
        $validate['prodi_id'] = auth()->user()->prodi_id;
        $validate['sender_id'] = auth()->user()->id;
        $validate['status'] = ''; // Status awal kosong
     
        $surat = Surat::create($validate);

        $surat->penerima()->attach($validate['penerima']); //Menggunakan attach() adalah cara untuk menghubungkan entitas Surat dengan entitas Penerima dalam hubungan many-to-many

        return redirect('surat-keluar');
    }

    public function show(Surat $surat) {
        
        $this->authorize('view', $surat);

        $pdf = PDF::loadView('layouts.surat.show-surat', ['surat' => $surat]);

        $recipient = $surat->surat_user->pluck('user_id')->toArray();

        if (in_array(auth()->user()->id, $recipient)) {
            $surat->update(['status' => 'Sudah Dibaca']);
    }

        return $pdf->stream('surat.pdf');

    }

    public function edit (Surat $surat){
        
        $this->authorize('update', $surat);

        return view('layouts.surat.edit-surat', ['users' => User::all(), 'surat' => $surat],['title' => 'Edit Surat']);
    }


    public function update(Request $request, Surat $surat) {
        
         $validate = $request->validate([
            'title' => 'required',
            'no_surat' => ['required', Rule::unique('surats')->ignore($surat->id), 'not_regex:/\//'],
            'content_surat' => 'required',
            'logo_surat' => ['mimes:jpeg,jpg,png'],
            'ttd_surat' => ['mimes:jpeg,jpg,png'],
            'penerima' => ['required', 'array', 'exists:users,id']
        ]);

        if($request->file('logo_surat')) {
            $validated['logo_surat'] = $request->file('logo_surat')->store('posts-image');
        }

        if($request->file('ttd_surat')) {
            $validated['ttd_surat'] = $request->file('ttd_surat')->store('posts-image');
        }

        $validate['prodi_id'] = auth()->user()->prodi_id;
        $validate['sender_id'] = auth()->user()->id;
        $validate['status'] = ''; // Status awal kosong

        $surat->update($validate);

        $surat->penerima()->sync($validate['penerima']);

        return redirect('/surat-keluar');

    }


    public function destroy($userId, $suratId) {

        SuratUser::where('surat_id', '=', $suratId)
        ->where('user_id', '=', $userId)
        ->delete();

        $ifSuratEmpty = SuratUser::where('surat_id', $suratId)->doesntExist();

        if($ifSuratEmpty) {
            Surat::where('id', '=', $suratId)->delete();
        }

        return redirect('/surat-keluar');
    }

   
}
