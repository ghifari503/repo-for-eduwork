@extends('layouts.admin')

@section('title', 'Home')
@section('page-heading', 'Home')

@section('content')
<!-- Content Row -->
<div class="row">

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Books
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }}</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-book fa-2x text-gray-300"></i>
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Members
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMembers }}</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Publishers
                     </div>
                     <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalPublishers }}</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-building fa-2x text-gray-300"></i>
                  </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Pending Requests Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Authors
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAuthors }}</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Content Row -->
<div class="row">
   <!-- Line Chart -->
   <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Top 10 Author With Most Books Chart</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <div class="chart-line pt-4 pb-2">
                  <canvas id="myLineChart"></canvas>
            </div>
         </div>
      </div>
   </div>
   <!-- Doughnut Chart -->
   <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Total Books Owned By Publisher Chart</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <div class="chart-doughnut pt-4 pb-2">
                  <canvas id="myDougnutChart"></canvas>
            </div>
         </div>
      </div>
   </div>
   <!-- Bar Chart -->
   <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
         <!-- Card Header -->
         <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Transactions Chart</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <div class="chart-bar pt-4 pb-2">
                  <canvas id="myBarChart"></canvas>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script>
// Generate random color
function getRandomRgb() {
   const num = Math.round(0xffffff * Math.random())
   const r = num >> 16;
   const g = num >> 8 & 255;
   const b = num & 255;
   return 'rgb(' + r + ', ' + g + ', ' + b + ')'
}

const randomColor = []
for (let i = 0; i < {{ $label_donut->count() }}; i++) {
   randomColor.push(getRandomRgb())
}

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
Chart.defaults.global.defaultFontColor = '#858796'
</script>

<!-- Top 10 Author With Most Books Chart -->
<script>
// Line Chart Example
var ctx = document.getElementById("myLineChart")
var myLineChart = new Chart(ctx, {
   "type": "line",
   "data": {
      "labels": {!! json_encode($authorsName) !!},
      "datasets":[{
         "label": "Total Books",
         "data": {!! json_encode($totalBooksOwnedByAuthor) !!},
      "fill":false,
      "borderColor":"rgb(75, 192, 192)",
      "lineTension":0.1}]
   },
   "options":{}
});
</script>

<!-- Publishers Chart -->
<script>
// Dougnut Chart Example
var ctx = document.getElementById("myDougnutChart")
var myDougnutChart = new Chart(ctx, {
   type: 'doughnut',
   data: {
      labels: {!! json_encode($label_donut) !!},
      datasets: [{
      data: {!! json_encode($data_donut) !!},
      backgroundColor: randomColor,
      }],
   },
   options: {
      maintainAspectRatio: false,
      tooltips: {
         backgroundColor: "rgb(255,255,255)",
         bodyFontColor: "#858796",
         borderColor: '#dddfeb',
         borderWidth: 1,
         xPadding: 15,
         yPadding: 15,
         displayColors: false,
         caretPadding: 10,
      },
      legend: {
         display: false
      },
         cutoutPercentage: 80,
   },
})
</script>

<!-- Transactions Chart -->
<script>
const data_bar = '{!! json_encode($data_bar) !!}'

new Chart(document.getElementById("myBarChart"), {
   "type": "bar",
   "data": {
      "labels": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "Desember"],
      "datasets": JSON.parse(data_bar),
   },
   "options":{}
})
</script>
@endsection