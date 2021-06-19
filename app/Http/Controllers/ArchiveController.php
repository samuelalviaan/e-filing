<?php

namespace App\Http\Controllers;


use App\Archive;
use App\CodeArchive;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $archive = Archive::with('code_archives')->get();
    //     return view('arsip.home', ['archive' => $archive]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_arsip = CodeArchive::all();
        return view('arsip.tambah', ['kode_arsip' => $kode_arsip]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
            'code_archive_id' => 'required',
            'kode_surat' => 'required',
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'file' => 'required|mimes:pdf|max:10000',
            'tahun' => 'required',
            'keterangan' => 'required'
        ]);

            $path = $request->file('file')->getClientOriginalName();

            Archive::create([ 'id' => $request->id,
            'code_archive_id' => $request->code_archive_id,
            'kode_surat' => $request->kode_surat,
            'nama_arsip' => $request->nama_arsip,
            'jenis_arsip' => $request->jenis_arsip,
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
            'filename' => $path,
            'file' => $request->file ? 
            $request->file('file')->storeAs('files', $path) : null, ]);

        return \redirect()->route('code_archive.index')
            ->with('success', 'Arsip berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $kodearsip = CodeArchive::findOrFail($id);
        $archive = Archive::where('code_archive_id', $id )->get();
        return \view('kode.kode', ['kodearsip' => $kodearsip, 'archive' => $archive]);
    }

    public function edit($id)
    {
        $archive = Archive::where('id', $id )->get();
        $code_archive = CodeArchive::all();
        return \view('kode.edit', ['archive' => $archive, 'code_archive' => $code_archive]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_surat' => 'required',
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required'
        ]);

        Archive::find($id)->update($request->all());

        return \redirect('/')->with('success', 'Data arsip berhasil diubah!');

    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Archive::where('id', $id)->firstOrFail();
        $delete->delete();
        return \redirect()->back()->with('danger', 'Data arsip berhasil dihapus');
    }

    public function download($id)
    {
        $archive = Archive::where('id', $id)->firstOrFail();
        return Storage::download($archive->file);
    }

    public function lihatArsip($id)
    {
        $archive = Archive::where('id', $id)->get();
        return \view('kode.lihatarsip', ['archive' => $archive]);
    }

    public function history()
    {
        return \view('arsip.history');
    }

    public function showPDF()
    {
        $archive = Archive::all();
        $pdf = PDF::loadView('bacapdf', ['archive' => $archive]);
        return $pdf->stream('laporan.pdf');
    }

}
