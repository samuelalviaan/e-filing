@extends('layouts.admin')

@section('main-content')

{{-- <div class="card">

    <div class="h3 card-header">Daftar Laporan</div>
    <div class="card-body">

            <a href="{{ route('reports.create') }}" class="btn btn-primary">Tambah Laporan</a>

            @foreach ($reports as $r)
                
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Nomor Laporan</th>
                    <th>Nama Laporan</th>
                    <th>Tanggal Dibuat</th>
                    <thead>Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $r->nomor_laporan }}</td>
                        <td>{{ $r->nama_laporan }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>
                            <a href="{{ route('reports.cetak') }}" class="btn btn-primary mb-2" target="_blank"><i
                                class="fas fa-print"></i> Cetak Laporan</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach

    </div>

</div> --}}

    <div class="card" style="margin-top: 3%">

        <div class="h3 card-header">Grafik Jumlah Arsip</div>
        <div class="card-body">

            <a href="{{ route('reports.cetak') }}" class="btn btn-primary mb-2" target="_blank"><i
                class="fas fa-print"></i> Cetak Laporan</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Archive Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
                integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($archive as $a)
                        `Kode {{ $a->kode_arsip }}`,
                        @endforeach
                    ],
                    datasets: [{
                        label: "Jumlah Arsip",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: [
                            @foreach ($archive as $a)
                                {{ $a->archives->count() }},
                            @endforeach
                        ],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '$' + number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                            }
                        }
                    },
                }
            });
        </script>
    @endsection
