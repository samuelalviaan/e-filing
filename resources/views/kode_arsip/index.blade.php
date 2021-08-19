@extends('layouts.admin')

@section('main-content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible show border-left-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif


    <div class="card">

        <div class="container">

            <div class="h3 card-header">Daftar Kode Arsip</div>
            <div class="card-body">

                <div class="mb-2">

                    <a href="{{ route('code_archives.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kode Arsip</a>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover table-bordered">
                        <thead class="bg-primary" style="color: white;">
                            <th scope="col">ID Kode Arsip</th>
                            <th scope="col">Nama Kode Arsip</th>
                            <th scope="col">Kode Arsip</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($code_archives as $c)
                                <tr>
                                    <td>{{ $c->archive_id }}</td>
                                    <td>{{ $c->nama_kode_arsip }}</td>
                                    <td>{{ $c->kode_arsip }}</td>
                                    <td>
                                        <div class="">
                                            <a href="{{ route('code_archives.edit', $c->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                            <a href="{{ route('code_archives.destroy', $c->id) }}" class="btn btn-danger ml-2"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection
