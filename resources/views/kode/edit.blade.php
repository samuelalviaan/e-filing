@extends('layouts.admin')

@section('title', 'Edit Arsip')

@section('main-content')

    <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 ml-4">{{ __('Edit Arsip') }}</h1>

<hr>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container">

    <div class="row">

        @foreach($archive as $arsip)
        <form action="{{ route('archive.update', $arsip->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md">
                
                {{-- <div class="form-group">
                    <label for="code_archive_id"><strong>Kode Arsip</strong></label>
                    <select class="form-control" id="code_archive_id" name="code_archive_id">
                    <option class="text-center">Pilih kode arsip</option>
                    @foreach ($code_archive as $kode)
                    <option class="text-center" value="">{{$kode->kode_arsip}}</option>
                    @endforeach
                    </select>
                </div> --}}

                
                <div class="form-group">
                    <label for="kode_surat"><strong>Kode Surat</strong></label>
                    <input type="text" id="kode_surat" name="kode_surat" class="form-control @error('kode_surat') is-invalid @enderror" value="{{ $arsip->kode_surat }}">
                </div>
                @error('kode_surat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="nama_arsip"><strong>Nama Arsip</strong></label>
                    <input type="text" id="nama_arsip" name="nama_arsip" class="form-control @error('nama_arsip') is-invalid @enderror" value="{{ $arsip->nama_arsip }}">
                </div>
                @error('nama_arsip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <div class="form-group">
                    <label for="jenis_arsip"><strong>Jenis Arsip</strong></label>
                    <input type="text" id="jenis_arsip" name="jenis_arsip" class="form-control @error('jenis_arsip') is-invalid @enderror" value="{{ $arsip->jenis_arsip }}">
                </div>
                @error('jenis_arsip')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ $arsip->keterangan }}</textarea>
                </div>
                @error('keterangan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="tahun"><strong>Tahun</strong></label>
                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ $arsip->tahun }}">
                </div>
                @error('tahun')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
{{-- 
                <div class="form-group">
                    <label for="file"><strong>File Arsip</strong></label>
                    <input type="file" id="file" name="file" class="form-control">
                </div> --}}

                <button type="submit" class="btn btn-primary">Update</button>

            </div>

        </form>
        @endforeach
    </div>

</div>

@endsection
