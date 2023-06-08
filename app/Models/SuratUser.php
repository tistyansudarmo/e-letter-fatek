<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratUser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'surat_user';

    public function surat() {

        return $this->belongsTo(Surat::class);
    }

    public function users() {

        return $this->belongsTo(User::class);
    }

}
