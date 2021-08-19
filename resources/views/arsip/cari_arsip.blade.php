@extends('layouts.admin')

@section('main-content')

    <div class="col-md-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible show border-left-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif

    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{ route('archives.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cari Arsip</li>
        </ol>
    </nav>

@if (Auth::user()->role == 'superadmin')

        <div class="card">

            <div class="card-header" style="font-size: 26px">Cari Arsip</div>
            <div class="card-body">

                <div class="container">

                    <div class="row">

                        <div class="table-responsive">

                            @if ($archive->count())

                                <table class="table table-bordered table-hover" style="border-width: 10px;">
                                    <thead style="background-color: #308cdd; color: white;">
                                        <tr class="text-light">
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
                                        @foreach ($archive as $a)
                                            <tr>
                                                <td>{{ $a->nomor_surat }}</td>
                                                <td>{!! Str::of($a->nama_arsip)->replace($keyword, $replace) !!}</td>
                                                <td>{{ $a->tahun }}</td>
                                                <td>{{ $a->keterangan }}</td>
                                                <td>{{ $a->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('archives.edit', $a->id) }}"
                                                        class="btn btn-primary rounded mr-1"><i class="fas fa-pen"></i></a>
                                                </td>
                                                <td class="">
                                                    <div class="btn-group shadow-0" role="group">
                                                        <form action="{{ route('archives.destroy', $a->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>

                                                    <a href="{{ route('archives.viewPDF', $a->id) }}"
                                                        class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>

                                                </td>
                                                <td>
                                                    <button class="btn btn-primary"><a
                                                            href="{{ route('archives.download', $a->id) }}"
                                                            style="color: white"><i
                                                                class="fas fa-download"></i></a></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                        </div>

                        <div style="margin-left: 35%">
                            {{ $archive->links() }}
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

        <div class="card-header" style="font-size: 26px">Cari Arsip</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <div class="table-responsive">

                        @if ($archive->count())

                            <table class="table table-bordered table-hover" style="border-width: 10px;">
                                <thead style="background-color: #308cdd; color: white;">
                                    <tr class="text-light">
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
                                    @foreach ($archive as $a)
                                        <tr>
                                            <td>{{ $a->nomor_surat }}</td>
                                            <td>{!! Str::of($a->nama_arsip)->replace($keyword, $replace) !!}</td>
                                            <td>{{ $a->tahun }}</td>
                                            <td>{{ $a->keterangan }}</td>
                                            <td>{{ $a->created_at }}</td>
                                            <td>
                                                <a href="{{ route('archives.edit', $a->id) }}"
                                                    class="btn btn-primary rounded mr-1"><i class="fas fa-pen"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('archives.viewPDF', $a->id) }}"
                                                    class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary"><a
                                                        href="{{ route('archives.download', $a->id) }}"
                                                        style="color: white"><i class="fas fa-download"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>

                    <div class="">
                        {{ $archive->links() }}
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

        <div class="card-header" style="font-size: 26px">Cari Arsip</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <div class="table-responsive">

                        @if ($archive->count())

                            <table class="table table-bordered table-hover" style="border-width: 10px;">
                                <thead style="background-color: #308cdd; color: white;">
                                    <tr class="text-light">
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
                                    @foreach ($archive as $a)
                                        <tr>
                                            <td>{{ $a->nomor_surat }}</td>
                                            <td>{!! Str::of($a->nama_arsip)->replace($keyword, $replace) !!}</td>
                                            <td>{{ $a->tahun }}</td>
                                            <td>{{ $a->keterangan }}</td>
                                            <td>{{ $a->created_at }}</td>
                                            <td>

                                                <a href="{{ route('archives.viewPDF', $a->id) }}"
                                                    class="btn btn-warning ml-2"><i class="fas fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <button class="btn btn-primary"><a
                                                        href="{{ route('archives.download', $a->id) }}"
                                                        style="color: white"><i class="fas fa-download"></i></a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </div>

                    <div class="">
                        {{ $archive->links() }}
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
