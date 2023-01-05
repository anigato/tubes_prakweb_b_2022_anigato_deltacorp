@extends('admin.layouts.main')
@section('css')
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('theme/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('theme/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('theme/backend/plugins/daterangepicker/daterangepicker.css') }}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('theme/backend/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('container')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6 row">
              <div class="col-md-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info py-3">
                  <div class="inner">
                    <h3>{{ $total_product }}<sup style="font-size: 20px"> Units</sup></h3>
                  </div>
                  <div class="icon">
                    <i class="fas fa-tags"></i>
                  </div>
                  <div class="small-box-footer">Total Of All Products <i class="fas fa-arrow-circle-right"></i></div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-md-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success py-3">
                  <div class="inner">
                    <h3>{{ $totalStok }}<sup style="font-size: 20px"> Pcs</sup></h3>
                  </div>
                  <div class="icon">
                    <i class="fas fa-cubes"></i>
                  </div>
                  <div class="small-box-footer">Total Of All Producs Stock <i class="fas fa-arrow-circle-right"></i></div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-md-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning py-3">
                  <div class="inner">
                    <h3>{{ $totalAdmin }}<sup style="font-size: 20px"> Users</sup></h3>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <div class="small-box-footer">Total Of User Admin <i class="fas fa-arrow-circle-right"></i></div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-md-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger py-3">
                  <div class="inner">
                    <h3>{{ $totalUser }}<sup style="font-size: 20px"> Users</sup></h3>
  
                    <p></p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="small-box-footer">Total Of All User <i class="fas fa-arrow-circle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Product Stock is Low!!</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-condensed" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;">
                    @foreach ($stokLow as $product)
                      <tr class="{{ ($product['stok'] < 10) ? 'text-danger font-weight-bold' : '' }}">
                        <td>{{ $product['name'] }}</td>
                        <td><span class="text-bold">{{ $product['stok'] }}</span> Pcs Remainings</td>
                      </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <!-- solid sales graph -->
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales this Week
                  </h3>

                  <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="saleChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->

            </section>
          </div>

          <section class="col-lg-12 connectedSortable">
            <!-- solid sales graph -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Earning this Week
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="earningChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </section>
        </div>
      </section>
    </div><!-- /.container-fluid -->
    <!-- /.content -->
  
@endsection

@section('script-custom')
    <!-- jQuery UI 1.11.4 -->
  <script src="../../../themes/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- ChartJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js" integrity="sha512-yadYcDSJyQExcKhjKSQOkBKy2BLDoW6WnnGXCAkCoRlpHGpYuVuBqGObf3g/TdB86sSbss1AOP4YlGSb6EKQPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Sparkline -->
  <script src="{{ asset('theme/backend/plugins/sparklines/sparkline.js') }}"></script>
  

  <!-- jQuery Knob Chart -->
  <script src="{{ asset('theme/backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  

  <!-- daterangepicker -->
  <script src=" {{ asset('theme/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
 
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('theme/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- Summernote -->
  <script src="{{ asset('theme/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script>
    // Sales graph chart
    var salesGraphChartCanvas = $('#saleChart').get(0).getContext('2d')
    var saleData = {
      datasets: [{
        label: 'Order',
        data: [<?= $order7d ?>, <?= $order6d ?>, <?= $order5d ?>, <?= $order4d ?>, <?= $order3d ?>, <?= $order2d ?>, <?= $orderToday ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.8)',
          'rgba(232, 62, 140, 0.8)',
          'rgba(52, 58, 64, 0.8)',
          'rgba(111, 66, 193, 0.8)',
          'rgba(255, 193, 7, 0.8)',
          'rgba(23, 162, 184, 0.8)',
          'rgba(40, 167, 70, 0.8)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(232, 62, 140, 1)',
          'rgba(52, 58, 64, 1)',
          'rgba(111, 66, 193, 1)',
          'rgba(255, 193, 7, 1)',
          'rgba(23, 162, 184, 1)',
          'rgba(40, 167, 70, 1)'
        ],
        borderWidth: 1,
        order: 2
      }, 
      {
        type: 'line',
        label: 'Product',
        backgroundColor: '#dc3545',
        borderColor: '#dc3545',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: 'rgba(255,99,132,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [<?= $order7dQty ?>, <?= $order6dQty ?>, <?= $order5dQty ?>, <?= $order4dQty ?>, <?= $order3dQty ?>, <?= $order2dQty ?>, <?= $orderTodayQty ?>],
        borderWidth: 3,
        tension: 0.4,
        order: 1
      }],
      labels: ['6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', '2 Days Ago', 'Yesterday', 'Today'],
    }
    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      datasetFill: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
    var salesGraphChart = new Chart(salesGraphChartCanvas, {
      type: 'bar',
      data: saleData,
      options: salesGraphChartOptions
    })


    //earning
    var earningChartCanvas = $('#earningChart').get(0).getContext('2d')
    var earningData = {
      datasets: [{
        type: 'line',
        label: 'Total Earnings',
        pointRadius: false,
        backgroundColor: '#dc3545',
        borderColor: 'rgb(23, 162, 184)',
        pointRadius: true,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: 'rgba(255,99,132,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [<?= $earn7d ?>, <?= $earn6d ?>, <?= $earn5d ?>, <?= $earn4d ?>, <?= $earn3d ?>, <?= $earn2d ?>, <?= $earnToday ?>],
        borderWidth: 3,
        tension: 0.3,
        order: 1
      }],
      labels: ['6 Days Ago', '5 Days Ago', '4 Days Ago', '3 Days Ago', '2 Days Ago', 'Yesterday', 'Today'],
    }

    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
    var salesGraphChart = new Chart(earningChartCanvas, {
      type: 'bar',
      data: earningData,
      options: salesGraphChartOptions
    })
  </script>
@endsection
