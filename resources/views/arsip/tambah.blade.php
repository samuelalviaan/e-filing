@extends('layouts.admin')

@section('title', 'Tambah Arsip')

@section('main-content')

    <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 ml-4">{{ __('Tambah Arsip') }}</h1>

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
    
        <form action="{{route('archives.store')}}" class="form-group" method="post" enctype="multipart/form-data">
            @csrf

            <div class="col-md-8">
                
                <div class="form-group">
                    <label for="kode_arsip"><strong>Kode Arsip</strong></label>
                    <select class="form-control" id="kode_arsip" name="kode_arsip">
                    <option class="text-center">Pilih kode arsip</option>
                    @foreach ($kode_arsip as $kode)
                    <option class="text-center" value="{{$kode->kode_arsip}}">{{$kode->kode_arsip}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kode_surat"><strong>Kode Surat</strong></label>
                    <input type="text" id="kode_surat" name="kode_surat" class="form-control @error('kode_surat') is-invalid @enderror" placeholder="..." value="{{ old('kode_surat') }}">
                </div>
                @error('kode_surat')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="nama_arsip"><strong>Nama Arsip</strong></label>
                    <input type="text" id="nama_arsip" name="nama_arsip" class="form-control @error('nama_arsip') is-invalid @enderror" placeholder="..." value="{{ old('nama_arsip') }}">
                </div>
                @error('nama_arsip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <div class="form-group">
                    <label for="jenis_arsip"><strong>Jenis Arsip</strong></label>
                    <input type="text" id="jenis_arsip" name="jenis_arsip" class="form-control @error('jenis_arsip') is-invalid @enderror" placeholder="..." value="{{ old('jenis_arsip') }}">
                </div>
                @error('jenis_arsip')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                @error('keterangan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="tahun"><strong>Tahun</strong></label>
                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="...">
                </div>
                @error('tahun')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="file"><strong>File Arsip</strong></label>
                    <input type="file" id="file" name="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

            </div>

        </form>

    </div>

</div>

{{-- <script type="text/javascript">

$('.datepicker').datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true,
});

</script> --}}

@endsection


