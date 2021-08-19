@extends('layouts.admin')

@section('title', 'Edit Arsip')

@section('main-content')

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">

    <div class="h3 card-header">Edit Arsip</div>
    <div class="card-body">

        <div class="container">

            <div class="row">
        
                @foreach($archive as $arsip)
                <form action="{{ route('archives.update', $arsip->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf

                        
                        <div class="row">

                            <div class="form-group col-md-6 focused">
                                <label for="code_archive_id"><strong>Kode Arsip<span class="small text-danger">*</span></strong></label>
                                <select class="form-control" id="code_archive_id" name="code_archive_id">
                                <option class="text-center">Pilih kode arsip</option>
                                @foreach ($code_archive as $kode)
                                <option class="text-center" value="{{ $arsip->code_archive_id }}">{{$kode->kode_arsip}} - {{ $kode->nama_kode_arsip }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6 focused">
                                <label for="nomor_surat"><strong>Nomor Surat<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="nomor_surat" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ $arsip->nomor_surat }}">
                            </div>
                            @error('nomor_surat')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
            
                            <div class="form-group col-md-6 focused">
                                <label for="nama_arsip"><strong>Nama Arsip<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="nama_arsip" name="nama_arsip" class="form-control @error('nama_arsip') is-invalid @enderror" value="{{ $arsip->nama_arsip }}">
                            </div>
                            @error('nama_arsip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group col-md-6">
                                <label for="tahun"><strong>Tahun<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ $arsip->tahun }}">
                            </div>
                            @error('tahun')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="keterangan"><strong>Keterangan</strong></label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ $arsip->keterangan }}</textarea>
                            </div>
                            @error('keterangan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
            
                        </div>
        
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('archives.index') }}" class="btn" style="color:red">Cancel</a>
        
                </form>
                @endforeach
            </div>
        
        </div>

    </div>

</div>

@endsection
