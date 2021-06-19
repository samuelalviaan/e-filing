@extends('layouts.admin')

@section('title', 'Tambah Kode Arsip')

@section('main-content')

<h1 class="h3 mb-2 text-gray-800 ml-4">{{ __('Tambah Kode Arsip') }}</h1>

<hr>

<div class="container">

    <div class="row">

        <div class="col-md-4">

            <form action="{{ route('kodearsip.store') }}" method="post" enctype="multipart/form-data">
               
                @csrf
                <div class="form-group">
                    <label for="nama_kode_arsip"><b>Nama Kode Arsip</b></label>
                    <input type="text" class="form-control" id="nama_kode_arsip" name="nama_kode_arsip" placeholder="...">
                </div>
    
                <div class="form-group">
                    <label for="kode_arsip"><b>Kode Arsip</b></label>
                    <input type="text" class="form-control" id="kode_arsip" name="kode_arsip" placeholder="...">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>

        </div>

    </div>

</div>
    
@endsection