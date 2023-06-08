<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penerima()
    {
        return $this->belongsToMany(User::class);
    }


    public function surat_user()
    {
        return $this->hasMany(SuratUser::class);
    }
}
