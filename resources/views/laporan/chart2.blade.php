@extends('layouts.admin')

@section('main-content')

<div class="card">

    <div class="h3 card-header">Grafik Laporan</div>
    <div class="card-body">

        <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('reports.index') }}">Laporan Per Tanggal</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="{{ route('reports.chart2') }}">Laporan Per Bulan</a>
                    </li>
              </ul>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">Dashboard</div>
                                <div class="panel-body">
                                    <canvas id="canvas" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

    </div>

</div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var year = <?php echo $year; ?>;
    var archive = <?php echo $archive; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Archive',
            backgroundColor: "pink",
            data: archive
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly User Joined'
                }
            }
        });
    };
</script>
@endsection
