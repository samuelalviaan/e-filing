@extends('layouts.admin')

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

        <div class=" h3 card-header">Daftar User</div>
        <div class="card-body">

            <div class="container">

                <a href="{{ route('users.create') }}" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Tambah User</a>

                <table class="table table-bordered table-hover">

                    <thead class="text-light bg-primary">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->jabatan }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>{{ $user->no_telp }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>

                                    <div class="row ml-2">

                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-2"><i class="fa fa-pen"
                                            aria-hidden="true"></i></a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>

                                        </form>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


        </div>
        <div class="card-footer">

            {{ $users->links() }}

        </div>

    </div>

@endsection
