@extends('layouts.admin')

@section('main-content')

<meta http-equiv="refresh" content="600" />

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>
    <hr>

    @if (session('success'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

        <div class="container">

            <div class="row">
                @foreach($archive as $arsip)
                <!-- Card untuk kode arsip -->
                <div class="card border-info mr-4 mb-4" style="width: 9rem; height: 14rem;">
                    <div class="card-header font-weight-bold border-info text-center text-light" style="background-color: #333333; font-size: 14px">Kode {{ $arsip->kode_arsip }}</div>
                    <div class="card-body">
                      <h5 class="card-title text-center font-weight-bold" style="font-size: 13px; justify: auto">{{ $arsip->nama_kode_arsip }}</h5>
                      <p class="h6 card-text text-center font-weight-bold">({{ $arsip->archives->count() }})</p>
                    </div>
                    <div class="card-footer bg-transparent border-info text-center"><a href="{{ route('archive.show', $arsip->id) }}" class="btn btn-dark">Lihat</a></div>
                </div>  
                @endforeach
            </div>

        </div>

@endsection
