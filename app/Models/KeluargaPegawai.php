<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaPegawai extends Model
{
    use HasFactory;
    protected $table = 'keluarga_pegawai';
    protected $fillable = [
         'nama', 'hubungan', 'pegawai_id'
    ];
    
}
