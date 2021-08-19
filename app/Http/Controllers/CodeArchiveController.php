<?php

namespace App\Http\Controllers;

use App\CodeArchive;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class CodeArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
        $this->middleware('auth');
    }

    public function index()
    {
        $code_archives = CodeArchive::all();
        return \view('kode_arsip.index', ['code_archives' => $code_archives]);
    }

    public function create()
    {
        return \view('kode_arsip.tambah');
    }

    public function store(Request $request)
    {
       $cd = $request->validate([
            'archive_id' => 'required',
            'nama_kode_arsip' => 'required',
            'kode_arsip' => 'required',
        ],[
            'archive_id.required' => 'ID Kode arsip harap diisi!',
            'nama_kode_arsip.required' => 'Nama kode arsip harap diisi!',
            'kode_arsip.required' => 'Kode arsip harap diisi!',
        ]);

        CodeArchive::create($cd);
        
        return \redirect()->route('code_archives.index')->with('success', 'Kode arsip berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cd = CodeArchive::where('id', $id)->get();
        return \view('kode_arsip.edit', ['cd' => $cd]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'archive_id' => 'required',
            'nama_kode_arsip' => 'required',
            'kode_arsip' => 'required',
        ],[
            'archive_id.required' => 'ID Kode arsip harap diisi!',
            'nama_kode_arsip.required' => 'Nama kode arsip harap diisi!',
            'kode_arsip.required' => 'Kode arsip harap diisi!',
        ]);

        CodeArchive::find($id)->update($request->all());

        return \redirect()->route('code_archives.index')->with('success', 'Data arsip berhasil diubah!');
    }

    public function destroy($id)
    {
        $cd = CodeArchive::where('id', $id)->firstOrFail();
        $cd->delete();
        return \redirect()->back()->with('success', 'Kode arsip berhasil dihapus');
    }

}
