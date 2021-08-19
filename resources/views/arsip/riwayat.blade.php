@extends('layouts.admin')

@section('main-content')

    <div class="container">

        <div class="col mb-4">
            <h3>Riwayat Arsip</h3>
        </div>

        <div class="row">

            @foreach ($archives as $archive)
                <div class="card col-md-3 mb-4">

                    <div class="card-body">
                        <b>({{ $archive->nama_arsip }})</b> telah ditambahkan oleh
                        <b>{{ Auth::user()->name }}</b> pada tanggal {{ $archive->created_at }}

                        <a href="{{ route('archives.download', $archive->id) }}"><br>Unduh File</a>
                    </div>

                </div>
            @endforeach

        </div>

        <div style="margin-left: 30%">

            {{ $archives->links() }}

        </div>

    </div>
@endsection
