@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Index</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">Admin Pannel</li>
        </ol>
    </div>
    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($monthly_earn,2) }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1"> Total Users</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $members }}</div>
                
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Stackholder Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Stack Holders</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $stakeholders }}</div>
                
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

     <!-- Orders -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">New Orders</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $neworder }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-body">
                    <div id="barchart_material" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>

   
@endsection 
@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['id', 'amount'],

            @php
                foreach($orders as $order) {
                    echo "['".$order->day."', ".$order->Total."],";
                }
            @endphp
        ]);

        var options = {
            chart: {
                title: 'Month | @php echo $today = @date('M') @endphp',
            },
            bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
@endsection