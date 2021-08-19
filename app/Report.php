<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_laporan', 'nama_laporan', 'bulan', 'tahun'
    ];

    protected $primaryKey = 'nomor_laporan';

    public $incrementing = false;
    
}
