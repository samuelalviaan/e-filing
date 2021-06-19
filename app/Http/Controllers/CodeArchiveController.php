<?php

namespace App\Http\Controllers;

use App\Archive;
use App\CodeArchive;
use Illuminate\Http\Request;

class CodeArchiveController extends Controller
{
    public function index()
    {
        $archive = CodeArchive::with(['archives'])->get();
        return \view('arsip.home', [
            'archive' => $archive,
        ]);
    }

    public function create()
    {
        $code_archive = CodeArchive::all();
        return view('kode.create', ['code_archive' => $code_archive]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code_archive_id' => 'required',
            'kode_surat' => 'required',
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'file' => 'required|mimes:pdf|max:10000',
            'tahun' => 'required',
            'keterangan' => 'required'
        ]);

        CodeArchive::create($data);

        return \redirect()->back();
    }




}