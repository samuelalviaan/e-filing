<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_id', 'kode_arsip', 'nama_kode_arsip'
    ];

    public function archives()
    {
        return $this->hasMany(Archive::class, 'code_archive_id');
    }

}
