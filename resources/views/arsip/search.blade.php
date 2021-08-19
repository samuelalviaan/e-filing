@extends('layouts.admin')

@section('main-content')

    <div class="card">

        <div class="card-header">Cari Arsip</div>
        <div class="card-body">

            <form action="{{ route('KMPSearch') }}" method="get">

                <input type="text" name="text" id="text">
                <button type="submit" name="cari"><b>Cari</b></button>

            </form>

        </div>

    </div>

@endsection
