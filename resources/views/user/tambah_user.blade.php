@extends('layouts.admin')

@section('main-content')



    <div class="card">

        <div class="h2 card-header">Tambah User</div>
        <div class="card-body">

            <div class="container">

                <div class="row">

                    <form action="{{ route('users.store') }}" method="post" autocomplete="off">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-4 focused">

                                <label for=""><strong>Nama Lengkap<span class="small text-danger">*</span></strong></label>
                                <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name"
                                    id="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-3 focused">

                                <label for=""><strong>Jabatan<span class="small text-danger">*</span></strong></label>
                                <input type="text" class="form-control mb-2 @error('jabatan') is-invalid @enderror"
                                    name="jabatan" id="jabatan" value="{{ old('jabatan') }}" placeholder="Masukkan jabatan">
                                @error('jabatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-5 focused">

                                <label for=""><strong>Alamat<span class="small text-danger">*</span></strong></label>
                                <input type="text" class="form-control mb-2 @error('alamat') is-invalid @enderror"
                                    name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Masukkan alamat">
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-3">

                                <label for=""><strong>Nomor Telepon<span class="small text-danger">*</span></strong></label>
                                <input type="text" class="form-control mb-2 @error('no_telp') is-invalid @enderror"
                                    name="no_telp" id="no_telp" value="{{ old('no_telp') }}" placeholder="Masukkan nomor telepon">
                                @error('no_telp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-5">

                                <label for=""><strong>Email<span class="small text-danger">*</span></strong></label>
                                <input type="text" class="form-control mb-2 @error('email') is-invalid @enderror"
                                    name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for=""><strong>Password<span class="small text-danger">*</span></strong></label>
                                <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Masukkan password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for=""><strong>Role</strong></label>
                                <select class="custom-select form-control @error('role') is-invalid @enderror" id="role"
                                    name="role">
                                    <option selected>
                                        <--- Pilih role --->
                                    </option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary mt-2"><i
                                    class="fas fa-plus fa-sm fa-fw mr-1"></i>Tambah</button>

                            <button type="reset" class="btn btn-danger mt-2 ml-2">Reset</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
