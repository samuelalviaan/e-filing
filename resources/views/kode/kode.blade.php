@extends('layouts.admin')

@section('main-content')

        @if (session('success'))
            <div class="alert alert-success alert-dismissible show border-left-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif



    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item"><a href="{{ route('archives.index') }}">Home</a></li>
          {{-- <li class="breadcrumb-item"><a href="{{  }}">Library</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Kode {{ $kodearsip->kode_arsip }}</li>
        </ol>
    </nav>

@if (Auth::user()->role == 'superadmin')

    <div class="card">

        <div class="card-header" style="font-size: 26px">Daftar Arsip Kode {{ $kodearsip->kode_arsip }}</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <div class="table-responsive">

                        @if ($archive->count())

                            <table class="table table-bordered table-hover" style="border-width: 10px; font-size:16px">
                                <thead style="background-color: #308cdd; color: white;">
                                    <tr class="text-light">

                                        <th scope="col">Kode Arsip</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Nama Arsip</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Hapus</th>
                                        <th scope="col">Lihat Arsip</th>
                                        <th scope="col">Unduh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archive as $dataarsip)
                                        <tr>

                                            <td>{{ $kodearsip->kode_arsip }} - {{ $kodearsip->nama_kode_arsip }}</td>
                                            <td>{{ $dataarsip->nomor_surat }}</td>
                                            <td>{{ $dataarsip->nama_arsip }}</td>
                                            <td>{{ $dataarsip->tahun }}</td>
                                            <td>{{ $dataarsip->keterangan }}</td>
                                            <td>{{ $dataarsip->created_at }}</td>
                                            <td>
                                                <a href="{{ route('archives.edit', $dataarsip->id) }}"
                                                    class="btn btn-primary rounded mr-1"><i class="fas fa-pen"></i></a>
                                            </td>
                                            <td class="">
                                                <div class="btn-group shadow-0" role="group">
                                                    <form action="{{ route('archives.destroy', $dataarsip->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="confirm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>

                                                <a href="{{ route('archives.viewPDF') }}" class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <button class="btn btn-primary"><a href="{{ route('archives.download',$dataarsip->id) }}"
                                                        style="color: white"><i class="fas fa-download"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>

                </div>

            @else

                <div class="alert alert-danger text-center">

                    Tidak ada arsip yang ditemukan.

                </div>

            </div>

            @endif

        </div>


    </div>

@elseif (Auth::user()->role == 'admin')

    <div class="card">

        <div class="card-header" style="font-size: 26px">Daftar Arsip Kode {{ $kodearsip->kode_arsip }}</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <div class="table-responsive">

                        @if ($archive->count())

                            <table class="table table-bordered table-hover" style="border-width: 10px; font-size:16px">
                                <thead style="background-color: #308cdd; color: white;">
                                    <tr class="text-light">

                                        <th scope="col">Kode Arsip</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Nama Arsip</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Lihat Arsip</th>
                                        <th scope="col">Unduh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archive as $dataarsip)
                                        <tr>

                                            <td>{{ $kodearsip->kode_arsip }} - {{ $kodearsip->nama_kode_arsip }}</td>
                                            <td>{{ $dataarsip->nomor_surat }}</td>
                                            <td>{{ $dataarsip->nama_arsip }}</td>
                                            <td>{{ $dataarsip->tahun }}</td>
                                            <td>{{ $dataarsip->keterangan }}</td>
                                            <td>{{ $dataarsip->created_at }}</td>
                                            <td>
                                                <a href="{{ route('archives.edit', $dataarsip->id) }}"
                                                    class="btn btn-primary rounded mr-1"><i class="fas fa-pen"></i></a>
                                            </td>
                                            <td>

                                                <a href="{{ route('archives.viewPDF') }}" class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <button class="btn btn-primary"><a href="{{ route('archives.download',$dataarsip->id) }}"
                                                        style="color: white"><i class="fas fa-download"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>

                </div>

            @else

                <div class="alert alert-danger text-center">

                    Tidak ada arsip yang ditemukan.

                </div>

            </div>

            @endif

        </div>


    </div>
        
@elseif (Auth::user()->role == 'user')
        
    <div class="card">

        <div class="card-header" style="font-size: 26px">Daftar Arsip Kode {{ $kodearsip->kode_arsip }}</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <div class="table-responsive">

                        @if ($archive->count())

                            <table class="table table-bordered table-hover" style="border-width: 10px; font-size:16px">
                                <thead style="background-color: #308cdd; color: white;">
                                    <tr class="text-light">

                                        <th scope="col">Kode Arsip</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Nama Arsip</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Lihat Arsip</th>
                                        <th scope="col">Unduh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archive as $dataarsip)
                                        <tr>

                                            <td>{{ $kodearsip->kode_arsip }} - {{ $kodearsip->nama_kode_arsip }}</td>
                                            <td>{{ $dataarsip->nomor_surat }}</td>
                                            <td>{{ $dataarsip->nama_arsip }}</td>
                                            <td>{{ $dataarsip->tahun }}</td>
                                            <td>{{ $dataarsip->keterangan }}</td>
                                            <td>{{ $dataarsip->created_at }}</td>
                                            <td>

                                                <a href="{{ route('archives.viewPDF') }}" class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <button class="btn btn-primary"><a href="{{ route('archives.download',$dataarsip->id) }}"
                                                        style="color: white"><i class="fas fa-download"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>

                </div>

            @else

                <div class="alert alert-danger text-center">

                    Tidak ada arsip yang ditemukan.

                </div>

            </div>

            @endif

        </div>


    </div>

@endif

@endsection
