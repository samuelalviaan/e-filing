<?php

namespace App\Http\Controllers;

use App\Archive;
use App\CodeArchive;
use App\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report::all();

        $archive = CodeArchive::with(['archives'])->get();

        $data = [
            'title' => 'Archive Chart',
            'archive' => $archive->all(),
        ];

        return \view('laporan.index', ['data' => $data, 'archive' => $archive, 'reports' => $reports]);

    }

    public function create()
    {
        return \view('laporan.create');
    }

    public function store(Request $request)
    {
        
    }

    public function filter(Request $request)
    {
        $input = $request->filter;

        $archive = Archive::where('created_at', 'like', '%'. $input. '%')
                    ->get();

        return \view('laporan.index', ['archive' => $archive]);
    }

    public function cetak_laporan()
    {
        $archive = CodeArchive::with(['archives'])->get();
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return \view('laporan.cetak_laporan', ['archive' => $archive, 'today' => $today]);   
    }

}
