@extends('layouts.admin')

@section('title', 'Tambah Kode Arsip')

@section('main-content')

<div class="card">
    <div class="h3 card-header">Tambah Kode Arsip</div>
    <div class="card-body">

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <form action="{{ route('code_archives.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group focused">
                            <label for="archive_id"><b>ID Kode Arsip<span class="small text-danger">*</span></b></label>
                            <input type="text" class="form-control @error('archive_id') is-invalid @enderror"
                                id="archive_id" name="archive_id" value="{{ old('archive_id') }}" placeholder="Masukkan ID kode arsip">
                        </div>
                        @error('archive_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="nama_kode_arsip"><b>Nama Kode Arsip<span
                                        class="small text-danger">*</span></b></label>
                            <input type="text" class="form-control @error('nama_kode_arsip') is-invalid @enderror"
                                id="nama_kode_arsip" name="nama_kode_arsip" value="{{ old('nama_kode_arsip') }}"
                                placeholder="Masukkan nama kode arsip">
                        </div>
                        @error('nama_kode_arsip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="kode_arsip"><b>Kode Arsip</b><span class="small text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_arsip') is-invalid @enderror"
                                id="kode_arsip" name="kode_arsip" value="{{ old('kode_arsip') }}" placeholder="Masukkan kode arsip">
                        </div>
                        @error('kode_arsip')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="reset" class="btn btn-danger ml-2">Reset</button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>


@endsection
