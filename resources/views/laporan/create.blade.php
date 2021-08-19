@extends('layouts.admin')

@section('main-content')

<div class="card">

    <div class="h3 card-header">Tambah Laporan</div>
    <div class="card-body">

        <div class="container">

            <div class="row">

                <form action="#" method="post">

                    <div class="form-group">

                        <label for="">Nomor Laporan</label>
                        <input type="text" class="form-control" name="nomor_laporan" id="nomor_laporan" placeholder="...">

                    </div>

                    <div class="form-group">

                        <label for="">Nama Laporan</label>
                        <input type="text" class="form-control" name="nama_laporan" id="nama_laporan" placeholder="...">

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>
    
@endsection