<?= $this->extend('App\Views\App\admin') ?>
<?= $this->section('pageSeo') ?>
<title>Admin dashboard</title>
<?= $this->endSection() ?>
<?= $this->section('pageStyles') ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Blood request'],
          <?php
          foreach ($blrmonthly as $row) {
              echo "['" . $row->monname . "'," . $row->count . '],';
          }
          ?>
        ]);

        var options = {
          title: 'Blood request monthly',
          hAxis: {title: 'Monthly',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 1}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'User registration'],
          <?php
          foreach ($uregmonthly as $row) {
              echo "['" . $row->monname . "'," . $row->count . '],';
          }
          ?>
        ]);

        var options = {
          title: 'User registration monthly',
          hAxis: {title: 'Monthly',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 1}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'manage and unmanage'],
          ['Manage', <?= $bloodmday ?>],
          ['Unmanage', <?= $bloodunday ?>]
        ]);

        var options = {
          title: 'Weekly blood manage and unmanage',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart4);
      function drawChart4() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'All Donors and inactive donor'],
          ['Donors', <?= $tucount ?>],
          ['Inacive', <?= $taucount ?>]
        ]);

        var options = {
          title: 'All Donor and Inactive Blood Donor',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }

      $(window).resize(function(){
  drawChart();
  drawChart2();
  drawChart3();
  drawChart4();
});

    </script>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b><?= $tucount ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small  warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Active donor</h4>
              <p><b><?= $taucount ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-medkit fa-3x"></i>
            <div class="info">
              <h4>Blood request</h4>
              <p><b><?= $tblreq ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-medkit fa-3x"></i>
            <div class="info">
              <h4>Total unmanaged request</h4>
              <p><b><?= $tablreq ?></b></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Monthly blood request</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <div id="chart_div" class="embed-responsive-item"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Monthly user registation</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <div id="chart_div2" class="embed-responsive-item"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Weekly blood manage and unmanage</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <div id="chart_div3" class="embed-responsive-item"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">All Donor and Inactive Blood Donor</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <div id="chart_div4" class="embed-responsive-item"></div>
            </div>
          </div>
        </div>
      </div>
<?= $this->endSection() ?>