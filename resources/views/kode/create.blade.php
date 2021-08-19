@extends('layouts.admin')

@section('title', 'Tambah Arsip')

@section('main-content')

    <!-- Page Heading -->

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="">

        <nav aria-label="breadcrumb">
            <ol class="p-2 breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('archives.index') }}">Home</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{  }}">Library</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Tambah Arsip</li>
            </ol>
        </nav>

    </div>

    <div class="card">

        <div class="card-header">
            <div class="d-flex flex-row">
                <p class="h3">Tambah Arsip</p>

            </div>
        </div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <form action="{{ route('archives.store') }}" class="form-group" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6 focused">
                                <label for="code_archive_id"><strong>Kode Arsip<span
                                            class="small text-danger">*</span></strong></label>
                                <select class="form-control" id="code_archive_id" name="code_archive_id">
                                    <option class="text-center">Pilih kode arsip</option>
                                    @foreach ($code_archive as $kode)
                                        <option class="text-center" value="{{ $kode->archive_id }}">
                                            {{ $kode->kode_arsip }} - {{ $kode->nama_kode_arsip }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 focused">
                                <label for="nomor_surat"><strong>Nomor Surat<span
                                            class="small text-danger">*</span></strong></label>
                                <input type="text" id="nomor_surat" name="nomor_surat"
                                    class="form-control @error('nomor_surat') is-invalid @enderror" placeholder="Masukkan nomor surat"
                                    autofocus autocomplete="off" value="{{ old('nomor_surat') }}">
                            </div>
                            @error('nomor_surat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group col-md-6 focused">
                                <label for="nama_arsip"><strong>Nama Arsip<span
                                            class="small text-danger">*</span></strong></label>
                                <input type="text" id="nama_arsip" name="nama_arsip"
                                    class="form-control @error('nama_arsip') is-invalid @enderror" placeholder="Masukkan nama arsip"
                                    autocomplete="off" value="{{ old('nama_arsip') }}">
                            </div>
                            @error('nama_arsip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group col-md-6 focused">
                                <label for="tahun"><strong>Tahun<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="tahun" name="tahun"
                                    class="datepicker form-control @error('tahun') is-invalid @enderror" placeholder="Pilih tahun"
                                    autocomplete="off" style="padding: 10px">
                            </div>
                            @error('tahun')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="keterangan"><strong>Keterangan</strong></label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                    name="keterangan" rows="3"></textarea>
                            </div>
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group col-md-4 focused">
                                <label for="file"><strong>File Arsip</strong></label>
                                <input type="file" id="file" name="file" class="form-control">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus fa-sm fa-fw"></i>
                            Tambah</button>

                        <button type="reset" class="btn btn-danger ml-2">Reset</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true,
        });
    </script>


@endsection
