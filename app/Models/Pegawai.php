<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nik', 'nama', 'tgl_pegawai', 'agama_id', 'jabatan_id'
    ];
    
    public function agama()
    {
        return $this->hasOne(Agama::class,'id');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class,'id');
    }

    public function keluarga()
    {
        return $this->hasMany(KeluargaPegawai::class);
    }

}
