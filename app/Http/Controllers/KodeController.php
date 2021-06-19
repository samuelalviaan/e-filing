<?php

namespace App\Http\Controllers;

use App\Archieve;
use App\Archive;
use App\Arsip;
use App\CodeArchieve;
use App\CodeArchive;
use App\Kode_Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class KodeController extends Controller
{
    public function kode331()
    {
        $query = DB::table('arsip')->where('kode_arsip', '331')->get();

        return view('kode.kode331', ['arsip' => $query]);
    }

    public function edit331(Request $request)
    {
        $arsip = request()->validate([
            'kode_surat' => 'required',
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required'
        ]);

        $id_arsip = $request->id_arsip;
        Archive::where(['id_arsip' => $id_arsip])->update([
            'kode_surat' => $request->kode_surat,
            'nama_arsip' => $request->nama_arsip,
            'jenis_arsip' => $request->jenis_arsip,
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan
        ]);


        return \redirect()->back();

        // if ($request->isMethod('post')) {
        //     $data = $request->all();

        //     Arsip::where('id_arsip')->update([
        //         'kode_surat' => $data['kode_surat'],
        //         'nama_arsip' => $data['nama_arsip'],
        //         'jenis_arsip' => $data['jenis_arsip'],
        //         'keterangan' => $data['keterangan'],
        //         'tahun' => $data['tahun'],
        //     ]);

        //     return \redirect()->back()->with('success', 'Data arsip berhasil diperbarui!');
        // }

        // $arsip = request()->validate([
        //     'kode_surat' => 'required',
        //     'nama_arsip' => 'required',
        //     'jenis_arsip' => 'required',
        //     'tahun' => 'required',
        //     'keterangan' => 'required'
        // ]);

        // $ars->update($arsip);

        // return \redirect()->back();
    }

    public function edit(Archive $archieve)
    {
        $kd_arsip = CodeArchive::all();
        return view('kode331.edit', \compact('arsip'), ['kode_arsip' => $kd_arsip]);
    }

    public function delete331($id_arsip)
    {
        $del331 = Archive::where('id_arsip', $id_arsip)->firstOrFail();
        $del331->delete();
        return \redirect()->back()->with('danger', 'Data arsip berhasil dihapus');
    }
}
