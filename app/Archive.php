<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_archive_id', 'kode_surat', 'nama_arsip', 'jenis_arsip', 
        'file', 'tahun', 'keterangan', 'filename'
    ];

    public function code_archives()
    {
        return $this->hasMany(CodeArchive::class);
    }
}
