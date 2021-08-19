@extends('layouts.admin')

@section('main-content')

    <div class="col-md-4">

        @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
    @endif

    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mb-4">

        <div class="card">

            <div class="h4 card-header">Akun Saya</div>
            <div class="card-body">

                <form method="POST" action="{{ route('users.update') }}" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="col-md-4">

                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Name<span
                                    class="small text-danger">*</span></label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                                value="{{ old('name', Auth::user()->name) }}">
                        </div>

                        <div class="form-group mt-2">
                            <label class="form-control-label" for="email">Email<span
                                    class="small text-danger">*</span></label>
                            <input type="email" id="email" class="form-control" name="email"
                                placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                        </div>

                        <div class="form-group focused">
                            <label class="form-control-label" for="current_password">Current password</label>
                            <input type="password" id="current_password" class="form-control" name="current_password"
                                placeholder="Current password">
                        </div>

                        <div class="form-group focused">
                            <label class="form-control-label" for="new_password">New password</label>
                            <input type="password" id="new_password" class="form-control" name="new_password"
                                placeholder="New password">
                        </div>

                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Confirm password</label>
                            <input type="password" id="confirm_password" class="form-control" name="password_confirmation"
                                placeholder="Confirm password">


                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>

        </div>

    </div>

@endsection
