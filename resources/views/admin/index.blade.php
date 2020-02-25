@extends('layouts.backend')

@section('content')

	<div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-laptop fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Users</h4>
                        <p><b>{{ count($users) }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                    <div class="info">
                        <h4>Books</h4>
                        <p><b>{{ count($books) }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
                    <div class="info">
                        <h4>Borrowers</h4>
                        <p><b>{{count($borrowers)}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                    <div class="info">
                        <h4>New Orders</h4>
                        <p><b>{{count($orders)}}</b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-bar"></i> Orders Ratio</div>
                    <div class="card-body" style="height:550px">
                        <canvas id="myBarChart" width="100%" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i> Books
                    </div>
                    <div class="card-body" style="height:550px">
                        <canvas id="myPieChart" width="100%" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
	
@endsection

@section('scripts')

<script>
    
    (function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';



        $.ajax({
            type: "GET",
            url: "/admin/books-ratio",
            success: function(response) {
                pieChart(response);
            },
            error: function(error) {
                console.log(error);
            }
        }); 



        $.ajax({
            type: "GET",
            url: "/admin/orders-ratio",
            success: function(response) {
                lineChart(response);
            },
            error: function(error) {
                console.log(error);
            }
        }); 

    })();



        //Line Chart 
   
     
        function lineChart(response){
        var lineChart = document.getElementById("myBarChart");
        var myLineChart = new Chart(lineChart, {
          type: 'bar',
          data: {
            labels: response.label,
            datasets: [{
              label: "Revenue",
              backgroundColor: "rgba(2,117,216,1)",
              borderColor: "rgba(2,117,216,1)",
              data: response.data,
            }],
          },
          options: {
            scales: {
              xAxes: [{
                time: {
                  unit: 'month'
                },
                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: 6
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 20,
                  maxTicksLimit: 5
                },
                gridLines: {
                  display: true
                }
              }],
            },
            legend: {
              display: false
            }
          }
        });
    }


    /*=======================*/
    function pieChart(response){
        // Pie Chart Example
        var ctxx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctxx, {
          type: 'pie',
          data: {
            labels: response.label,
            datasets: [{
              data: response.data,
              backgroundColor: ['#007bff', '#6610f2', '#6f42c1', '#e83e8c', '#dc3545', '#fd7e14', '#ffc107', '#28a745', '#20c997', '#17a2b8', '#6c757d', '#343a40', '#009688', '#6c757d', '#28a745', '#17a2b8', '#ffc107', '#dc3545', '#f8f9fa', '#343a40'],
            }],
          },
        });

    }

</script>

@endsection