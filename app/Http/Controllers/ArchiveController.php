<?php

namespace App\Http\Controllers;

use App\Archive;
use App\CodeArchive;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin')->only('destroy');
        $this->middleware('auth');
    }

    /**|
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archive = CodeArchive::with(['archives'])->get();
        $user = User::all();
        return \view('arsip.home', [
            'archive' => $archive,
            'user' => $user,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code_archive = CodeArchive::all();
        $archive = Archive::all();
        return view('kode.create', ['code_archive' => $code_archive, 'archive' => $archive]);
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
            'nomor_surat' => 'required',
            'nama_arsip' => 'required',
            'file' => 'required|mimes:pdf|max:10000',
            'tahun' => 'required',
            'keterangan' => 'required',
        ],
            [
                'nomor_surat.required' => 'Kode surat harus diisi!',
                'nama_arsip.required' => 'Nama arsip harus diisi!',
                'tahun.required' => 'Tahun harus diisi!',
                'keterangan.required' => 'Keterangan harus diisi!',
            ]
        );

        $path = $request->file('file')->getClientOriginalName();

        Archive::create(['id' => $request->id,
            'code_archive_id' => $request->code_archive_id,
            'nomor_surat' => $request->nomor_surat,
            'nama_arsip' => $request->nama_arsip,
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
            'filename' => $path,
            'file' => $request->file ?
            $request->file('file')->storeAs('files', $path) : null]);

        return \redirect()->route('archives.index')
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
        $archive = Archive::where('code_archive_id', $id)->orderBy('nama_arsip', 'asc')->paginate(100);
        return \view('kode.kode', ['kodearsip' => $kodearsip, 'archive' => $archive]);
    }

    public function edit($id)
    {
        $archive = Archive::where('id', $id)->get();
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
            'nomor_surat' => 'required',
            'nama_arsip' => 'required',
            'keterangan' => 'required',
            'tahun' => 'required',
        ]);

        Archive::find($id)->update($request->all());

        return \redirect()->route('archives.index')->with('success', 'Data arsip berhasil diubah!');

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
        return \redirect()->back()->with('success', 'Data arsip berhasil dihapus');
    }

    public function download($id)
    {
        $archive = Archive::where('id', $id)->firstOrFail();
        return Storage::download($archive->file);
    }

    public function viewPDF()
    {
        $filename = "test_file.pdf";
        $path = public_path($filename);
        return \response()->file($path, [
            'Content-Type' => 'application/pdf',

            'Content-Disposition' => 'inline; filename="' . $filename . '"',

        ]);
    }

    public function history()
    {
        $archives = DB::table('archives')->orderBy('nama_arsip', 'asc')
            ->select('*')
            ->paginate(48);
        $users = User::all();
        return \view('arsip.riwayat', ['archives' => $archives, 'users' => $users]);
    }

    public function showPDF()
    {
        $archive = CodeArchive::with(['archives'])->get();
        $pdf = PDF::loadView($archive->archives->file, ['archive' => $archive]);
        return $pdf->stream('arsip.pdf');
    }

    public function search(Request $request, CodeArchive $kodearsip)
    {
        $keyword = $request->search;

        $archive = Archive::
            where('nama_arsip', 'like', "%" . $keyword . "%")
            ->select('*')
            ->orderBy('nama_arsip', 'asc')
            ->paginate(50);

        $replace = Str::of($keyword)->replace($keyword, "<b><span class='text-danger'>$keyword</span></b>");

        return \view('arsip.cari_arsip', \compact('archive', 'kodearsip', 'replace', 'keyword'));
    }

    public function KMPSearch($p, $t)
    {
        $hasil = array();
        // pattern dan text dijadikan array
        $pattern = str_split($p);
        $text = str_split($t);

        // hitung tabel lompatan dengan preKMP()
        $lompat = $this->preKMP($pattern);
        //print_r($lompat);

        // perhitungan KMP
        $i = $j = 0;
        $num = 0;
        while ($j < count($text)) {
            if (isset($pattern[$i]) && isset($lompat[$i])) {
                while ($i > -1 && $pattern[$i] != $text[$j]) {
                    // jika tidak cocok, maka lompat sesuai tabel lompatan
                    $i = $lompat[$i];
                }
            } else {
                $i = 0;
            }

            $i++;
            $j++;
            if ($i >= count($pattern)) {
                // jika cocok, tentukan posisi string yang cocok
                // kemudian lompat ke string berikutnya
                $hasil[$num++] = $j - count($pattern);
                if (isset($lompat[$i])) {
                    $i = $lompat[$i];
                }
            }
        }
        return \view('arsip.cari_arsip', $hasil);
    }

    /* menetukan tabel lompatan dengan preKMP
     * input :
     *   $pattern = (string) pattern
     * output :
     *   $lompat = (array int) untuk jumlah lompatan
     */
    public function preKMP($pattern)
    {
        $i = 0;
        $j = $lompat[0] = -1;
        while ($i < count($pattern)) {
            while ($j > -1 && $pattern[$i] != $pattern[$j]) {
                $j = $lompat[$j];
            }
            $i++;
            $j++;
            if (isset($pattern[$i]) && isset($pattern[$j])) {
                if ($pattern[$i] == $pattern[$j]) {
                    $lompat[$i] = $lompat[$j];
                } else {
                    $lompat[$i] = $j;
                }
            }
        }
        return $lompat;
    }

    public function KMPReplace($str1, $str2, $text)
    {
        $num = 0;
        $location = $this->KMPSearch($str1, $text);
        $t = '';
        $n = 0;
        $nn = 0;
        foreach ($location as $in) {
            $t .= substr($text, $n + $nn, $in - $n - $nn) . $str2;
            $nn = strlen($str1);
            $n = $in;
        }
        $t .= substr($text, $n + $nn);
        return $t;
    }
    // public function KMPSearch($pat, $txt)
    // {
    //     $M = strlen($pat);
    //     $N = strlen($txt);

    //     // create lps[] that will hold the longest prefix suffix
    //     // values for pattern
    //     $lps = array_fill(0, $M, 0);

    //     // Preprocess the pattern (calculate lps[] array)
    //     $this->computeLPSArray($pat, $M, $lps);

    //     $i = 0; // index for txt[]
    //     $j = 0; // index for pat[]
    //     while ($i < $N) {
    //         if ($pat[$j] == $txt[$i]) {
    //             $j++;
    //             $i++;
    //         }

    //         if ($j == $M) {
    //             printf("Found pattern at index " . ($i - $j));
    //             $j = $lps[$j - 1];
    //         }

    //         // mismatch after j matches
    //         else if ($i < $N && $pat[$j] != $txt[$i]) {
    //             // Do not match lps[0..lps[j-1]] characters,
    //             // they will match anyway
    //             if ($j != 0) {
    //                 $j = $lps[$j - 1];
    //             } else {
    //                 $i = $i + 1;
    //             }

    //         }
    //     }
    // }

    // // Fills lps[] for given patttern pat[0..M-1]
    // public function computeLPSArray($pat, $M, &$lps)
    // {
    //     // length of the previous longest prefix suffix
    //     $len = 0;

    //     $lps[0] = 0; // lps[0] is always 0

    //     // the loop calculates lps[i] for i = 1 to M-1
    //     $i = 1;
    //     while ($i < $M) {
    //         if ($pat[$i] == $pat[$len]) {
    //             $len++;
    //             $lps[$i] = $len;
    //             $i++;
    //         } else // (pat[i] != pat[len])
    //         {
    //             // This is tricky. Consider the example.
    //             // AAACAAAA and i = 7. The idea is similar
    //             // to search step.
    //             if ($len != 0) {
    //                 $len = $lps[$len - 1];

    //                 // Also, note that we do not increment
    //                 // i here
    //             } else // if (len == 0)
    //             {
    //                 $lps[$i] = 0;
    //                 $i++;
    //             }
    //         }
    //     }

    //     return \view('arsip.home', $pat, $lps);
    // }

}
