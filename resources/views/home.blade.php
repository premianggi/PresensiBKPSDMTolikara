@extends('template')
@section('title','Dashboard')
@section('content')

<div class="row">
        <div class="col-lg-6 col-xs-10">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$pegawai}}<sup style="font-size: 20px"></sup></h3>

              <p>Jumlah Pegawai</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="/pegawai" class="small-box-footer">More info <i class="fa fa-arrow-users-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-6 col-xs-10">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3></h3>
              <p>Jumlah Kehadiran</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/kehadiran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      {{-- <h3 class="box-title"> Presentasi Kehadiran Hari Ini</h3> --}}
      <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
        
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['HADIR',     {{ $jmlHadir }}],
                ]);
        
                var options = {
                  title: 'Data Kehadiran Pegawai BKPSDM Tolikara'
                };
        
                var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="linechart" style="width: 900px; height: 500px"></div>
          </body>
        </html>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      {{-- <h3 class="box-title"> Presentasi Kehadiran Hari Ini</h3> --}}
     
      <html>
      <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['line']});
            google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            // var data = google.visualization.arrayToDataTable([
            //       ['Task', 'Hours per Day'],
            //       ['TIDAK HADIR',     {{ $jmlTdkHadir }}],
            //       ['SAKIT',     {{ $jmlSakit }}],
            //       ['IZIN',     {{ $jmlIzin }}],
            //       ['CUTI',     {{ $jmlCuti }}]
            //     ]);
                var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Tidak hadir');
      data.addColumn('number', 'Sakit');
      data.addColumn('number', 'Cuti');
      data.addColumn('number', 'Izin');

      data.addRows([
        [1,  {{$jmlTdkHadir}}, {{$jmlSakit}}, {{$jmlCuti}}, {{$jmlCuti}}],
        [2,  {{$jmlTdkHadir}}, {{$jmlSakit}}, {{$jmlCuti}}, {{$jmlCuti}}],
        [3,  {{$jmlTdkHadir}}, {{$jmlSakit}}, {{$jmlCuti}}, {{$jmlCuti}}],
        [4,  {{$jmlTdkHadir}}, {{$jmlSakit}}, {{$jmlCuti}}, {{$jmlCuti}}],
        [5,  {{$jmlTdkHadir}}, {{$jmlSakit}}, {{$jmlCuti}}, {{$jmlCuti}}],
        
        // [2,  30.9, 69.5, 32.4],
        // [3,  25.4,   57, 25.7],
        // [4,  11.7, 18.8, 10.5],
        // [5,  11.9, 17.6, 10.4],
        // [6,   8.8, 13.6,  7.7],
        // [7,   7.6, 12.3,  9.6],
        // [8,  12.3, 29.2, 10.6],
        // [9,  16.9, 42.9, 14.8],
        // [10, 12.8, 30.9, 11.6],
        // [11,  5.3,  7.9,  4.7],
        // [12,  6.6,  8.4,  5.2],
        // [13,  4.8,  6.3,  3.6],
        // [14,  4.2,  6.2,  3.4]
      ]);

            // var data = new google.visualization.DataTable();
      
            // data.addColumn('number', 'Day');
            // data.addColumn('Tidak hadir',{{$jmlTdkHadir}});
            // data.addColumn('Sakit',{{$jmlSakit}});
            // data.addColumn('Izin',{{$jmlIzin}});

            

            var options = {
              chart: {
                title: 'Data Ketidak hadiran Pegawai BKPSDM Tolikara',
              },
              width: 900,
              height: 500,
                    vAxis: {
                    viewWindow: {
                        min: 0,
                        max: 10
                    },
                    ticks: [0, 25, 50, 75, 100] // display labels every 25
                },
                hAxis: {
                    viewWindow: {
                        min: 1,
                        max: 5
                    },
                    ticks: [0, 25, 50, 75, 100] // display labels every 25
                },
              axes: {
                x: {
                  0: {side: 'top'}
                }
              }
            };

            var chart = new google.charts.Line(document.getElementById('line_top_x'));

            chart.draw(data, google.charts.Line.convertOptions(options));
          }
        </script>
      </head>
      <body>
        <div id="line_top_x"></div>
      </body>
</html>

    </div>
  </div>
</div>
</div>
</section>
@endsection