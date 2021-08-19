<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeArchivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('code_archives')->insert([
            [
                'archive_id' => '1',
                'nama_kode_arsip' => 'SKCK',
                'kode_arsip' => '331'
            ],
            [
                'archive_id' => '2',
                'nama_kode_arsip' => 'SKTM Pendidikan',
                'kode_arsip' => '420'
            ],
            [
                'archive_id' => '3',
                'nama_kode_arsip' => 'SKTM Kesehatan',
                'kode_arsip' => '440'
            ],
            [
                'archive_id' => '4',
                'nama_kode_arsip' => 'Domisili Haji',
                'kode_arsip' => '456'
            ],
            [
                'archive_id' => '5',
                'nama_kode_arsip' => 'SPD, DS, DWNA',
                'kode_arsip' => '470'
            ],
            [
                'archive_id' => '6',
                'nama_kode_arsip' => 'Akte Kelahiran, Kenal Lahir',
                'kode_arsip' => '474.1'
            ],
            [
                'archive_id' => '7',
                'nama_kode_arsip' => 'Keterangan Belum Menikah, N/A',
                'kode_arsip' => '474.2'
            ],
            [
                'archive_id' => '8',
                'nama_kode_arsip' => 'Surat Kematian, Ahli Waris',
                'kode_arsip' => '474.3'
            ],
            [
                'archive_id' => '9',
                'nama_kode_arsip' => 'KTP, KK',
                'kode_arsip' => '474.4'
            ],
            [
                'archive_id' => '10',
                'nama_kode_arsip' => 'Surat Pindah Keluar',
                'kode_arsip' => '475'
            ],
            [
                'archive_id' => '11',
                'nama_kode_arsip' => 'Domisili Perusahaan',
                'kode_arsip' => '503'
            ],
            [
                'archive_id' => '12',
                'nama_kode_arsip' => 'SKU',
                'kode_arsip' => '517'
            ],
            [
                'archive_id' => '13',
                'nama_kode_arsip' => 'TTD SPTB',
                'kode_arsip' => '882'
            ],
            [
                'archive_id' => '14',
                'nama_kode_arsip' => 'DY, SKTMS, SKSG',
                'kode_arsip' => '888'
            ]
        ]);
    }
}
