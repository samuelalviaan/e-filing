@extends('layouts.admin')

@section('main-content')

    <meta http-equiv="refresh" content="600" />

    <!-- Page Heading -->

    @if (session('success'))
        <div class="alert alert-success alert-dismissible show border-left-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success alert-dismissible show border-left-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <div class="container">

                <form class="form" method="GET" action="{{ route('archives.search') }}">
                    <div class="form-group mb-3">
                        <label for="search" class="d-block mr-2">Pencarian</label>
                        <input type="text" name="search" class="form-control d-inline" id="search"
                            placeholder="Ketik disini untuk cari arsip..." style="width: 300px">
                        <button type="submit" class="btn btn-primary ml-2">Cari</button>
                    </div>
                </form>


                <div class="row">
                    @foreach ($archive as $arsip)
                        <!-- Card untuk kode arsip -->
                        <div class="card border-primary mr-4 mb-4" style="width: 9rem; height: 12rem;">
                            <div class="card-header font-weight-bold border-primary text-center"
                                style="background-color: #005A8D; color: rgb(255, 255, 255); font-size: 16px;">Kode
                                {{ $arsip->kode_arsip }}</div>
                            <div class="card-body">
                                <h5 class="card-title text-center font-weight-bold" style="font-size: 14px; justify: auto">
                                    {{ $arsip->nama_kode_arsip }}</h5>
                            </div>
                            <div class="card-footer border-primary text-center"><a
                                    href="{{ route('archives.show', $arsip->id) }}" class="btn btn-primary border-primary"
                                    style="font-size: 14px;">Lihat <span
                                        class="badge badge-light">{{ $arsip->archives->count() }}</span></a></div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>

@endsection
