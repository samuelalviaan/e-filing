@extends('layouts.admin')

@section('title', 'Edit Kode Arsip')

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

    <div class="h3 card-header">Edit Kode Arsip</div>
    <div class="card-body">

        <div class="container">

            <div class="row">
        
                @foreach($cd as $c)
                <form action="{{ route('code_archives.update', $c->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
                    @csrf
                            
                            <div class="form-group focused">
                                <label for="nomor_surat"><strong>ID Kode Arsip<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="archive_id" name="archive_id" class="form-control @error('archive_id') is-invalid @enderror" value="{{ $c->archive_id }}">
                            </div>
                            @error('archive_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
            
                            <div class="form-group ">
                                <label for="nama_kode_arsip"><strong>Nama Kode Arsip<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="nama_kode_arsip" name="nama_kode_arsip" class="form-control @error('nama_kode_arsip') is-invalid @enderror" value="{{ $c->nama_kode_arsip }}">
                            </div>
                            @error('nama_kode_arsip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="kode_arsip"><strong>Kode Arsip<span class="small text-danger">*</span></strong></label>
                                <input type="text" id="kode_arsip" name="kode_arsip" class="form-control @error('kode_arsip') is-invalid @enderror" value="{{ $c->kode_arsip }}">
                            </div>
                            @error('kode_arsip')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
        
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('code_archives.index') }}" class="btn" style="color: red">Cancel</a>
                </form>
                @endforeach
            </div>
        
        </div>

    </div>

</div>

@endsection
