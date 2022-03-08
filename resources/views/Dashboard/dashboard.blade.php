@extends('Dashboard.admin')
@section('content')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>
          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">   User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> 0%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Vendors</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user1}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> 0%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1"> Package</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$package}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"></i>0%</span>
                        <span>Since last Month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-envelope-open-text fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Messages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$message}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> 0%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 <!-- Area Chart -->
            <div class="row">
            <div class="col-xl-8 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Top Selling Ads</h6>
                  
                </div>
                <div class="card-body">
                  
                    <div id="piechart" style="width: 900px; height: 500px;"></div>
                
                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card">
                <div class="card-header py-4  d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Message From Customer</h6>
                </div>
                <div>
                   <div class="card-body">
                    @foreach($messages as $message)
                    <p>{{$message['message']}}</p>
                    @endforeach
                   </div>
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="{{route('message.index')}}">View More <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
           
            <!-- Message From Customer-->
            <div class="col-xl-4 col-lg-5 ">
              
            </div>
          </div>
          <!--Row-->
         

        </div>
        <!---Container Fluid-->
      </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'product pr sell'],
          <?php echo $chartdata ?>
        ]);

        var options = {
          title: 'Top Selling Ads Packages'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


@endsection
