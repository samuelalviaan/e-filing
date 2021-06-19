@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Arsip Kode {{ $kodearsip->kode_arsip }}</h1>

    <div class="container">

      <div class="input-group rounded mb-3" style="width: 275px">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
          aria-describedby="search-addon" />
        <span class="btn btn-outline-dark btn-light ml-1" id="search-addon">
          <i class="fas fa-search"></i>
        </span>
      </div>

    <div class="row">

      <div class="table-responsive">

        <table class="table table-bordered table-hover" style="border-width: 10px">
          <thead style="background-color: #a6e3e9">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Arsip</th>
              <th scope="col">Kode Surat</th>
              <th scope="col">Nama Arsip</th>
              <th scope="col">Jenis Arsip</th>
              <th scope="col">File</th>
              <th scope="col">Tahun</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Aksi</th>
              <th scope="col">Cetak</th>
            </tr>
          </thead>
          <?php $no = 1; ?>
           <tbody>
            @foreach($archive as $dataarsip)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $kodearsip->kode_arsip}}</td>
                <td>{{ $dataarsip->kode_surat }}</td>
                <td>{{ $dataarsip->nama_arsip }}</td>
                <td>{{ $dataarsip->jenis_arsip }}</td>
                <td><a href="{{ route('archives.download', $dataarsip->id) }}">{{ $dataarsip->filename }}</a></td>
                <td>{{ $dataarsip->tahun }}</td>
                <td>{{ $dataarsip->keterangan }}</td>
                <td class="">
                  <div class="btn-group shadow-0" role="group">
                    <a href="{{ route('archive.edit', $dataarsip->id) }}" class="btn btn-info rounded mr-1"><i class="fas fa-pen"></i></a>
                    <a href="{{ route('archives.lihatarsip', $dataarsip->id) }}" class="btn btn-warning rounded mr-1"><i class="fas fa-eye"></i></a>
                    <form action="{{ route('archive.destroy', $dataarsip->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                  </div>
                </td>
                <td>
                  <button class="btn btn-primary"><a href="/cetak_pdf" target="_blank">Convert PDF</a></button>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>

    </div>

@endsection