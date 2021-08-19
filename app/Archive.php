<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_archive_id', 'nomor_surat', 'nama_arsip', 
        'file', 'tahun', 'keterangan', 'filename'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
                ->translatedFormat('l, d F Y');
    }

    public function code_archives()
    {
        return $this->belongsTo(CodeArchive::class, 'archive_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
