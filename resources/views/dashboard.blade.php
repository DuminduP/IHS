<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
  <title>@yield('title') {{ config('app.name', 'GIHS') }}</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js')}}"></script>
  <script src="https://kit.fontawesome.com/f65aa0b8c1.js" crossorigin="anonymous"></script>
  <style>
    .icon-lg i {
      top: 25%;
      font-size: 2rem;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('list-grievanse')}}">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">assignment</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Grievances</p>
                  <h4 class="mb-0">{{$grievances_count}}</h4>
                </div>
              </div>
            </div>
            </a>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{route('list-grievanse')}}/Done">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">fact_check</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Completed Grievances</p>
                  <h4 class="mb-0">{{$grievances_completed}}</h4>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{route('list-grievanse')}}/open">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">note_add</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">New Grievances</p>
                  <h4 class="mb-0">{{$grievances_new}}</h4>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-xl-3 col-sm-6">
          <a href="{{route('list-grievanse')}}/In-prograss">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">pending</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">In-prograss</p>
                  <h4 class="mb-0">{{$grievances_inp}}</h4>
                </div>
              </div>
            </div>
          </a>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 ">Grievances by Day</h6>
                <p class="text-sm ">Number of grievances by day</p>
                <hr class="dark horizontal">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2  ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 "> Monthly New Grievances </h6>
                <p class="text-sm "> Number of New Grievances by Month </p>
                <hr class="dark horizontal">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mb-3">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 "> Monthly Completed Grievances</h6>
                <p class="text-sm ">Number of Completed Grievances by Month</p>
                <hr class="dark horizontal">
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6><a href="{{route('report-category')}}">Grievance Categories %</a></h6>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="card z-index-2 ">
                    <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                      <div class="chart">
                        <canvas id="chart-categories" class="chart-canvas" height="240"></canvas>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6><a href="{{route('report-status')}}">Grievance Status %</a></h6>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="card z-index-2 ">
                    <div class="bg-gradient-success shadow-dark border-radius-lg py-3 pe-1">
                      <div class="chart">
                        <canvas id="chart-status" class="chart-canvas" height="240"></canvas>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mb-3">
          <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6><a href="{{route('report-location')}}">Grievance Location %</a></h6>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="card z-index-2 ">
                    <div class="bg-gradient-warning shadow-dark border-radius-lg py-3 pe-1">
                      <div class="chart">
                        <canvas id="chart-location" class="chart-canvas" height="240"></canvas>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         
        </div>
        <footer class="footer py-4  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  Made with <i class="fa fa-heart"></i> by
                  <a href="mailto:SampathPerera@hotmail.com" class="font-weight-bold" target="_blank">Sampath Perera</a>
                  for a SL people.
                </div>
              </div>
            
            </div>
          </div>
        </footer>
      </div>
    </main>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: {!! json_encode(array_keys($grievances_weekly)) !!},
          datasets: [{
            label: "Grievances",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: {!! json_encode(array_values($grievances_weekly)) !!},
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
              },
              ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: {!! json_encode(array_keys($grievances_new_monthly)) !!},
          datasets: [{
            label: "Grievances",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: {!! json_encode(array_values($grievances_new_monthly)) !!},
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
              },
              ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });

      var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

      new Chart(ctx3, {
        type: "line",
        data: {
          labels: {!! json_encode(array_keys($grievances_done_monthly)) !!},
          datasets: [{
            label: "Grievances",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: {!! json_encode(array_values($grievances_done_monthly)) !!},
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: 'rgba(255, 255, 255, .2)'
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#f8f9fa',
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#f8f9fa',
                padding: 10,
                font: {
                  size: 14,
                  weight: 300,
                  family: "Roboto",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });

      var ctx4 = document.getElementById("chart-categories").getContext("2d");

      new Chart(ctx4, {
        type: "pie",
        data: {
          labels: {!! json_encode(array_keys($grievances_category)) !!},
          datasets: [{
            label: "Grievances",
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(255, 255, 86)',
              'rgb(155, 205, 186)',
              'rgb(105, 105, 106)',
            ],
            data: {!! json_encode(array_values($grievances_category)) !!},
            hoverOffset: 4
          }],
        },
      });

      var ctx5 = document.getElementById("chart-status").getContext("2d");

      new Chart(ctx5, {
        type: "pie",
        data: {
          labels: {!! json_encode(array_keys($grievances_status)) !!},
          datasets: [{
            label: "Grievances",
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(255, 255, 86)',
              'rgb(155, 205, 186)',
              'rgb(105, 105, 106)',
            ],
            data: {!! json_encode(array_values($grievances_status)) !!},
            hoverOffset: 4
          }],
        },
      });

      var ctx6 = document.getElementById("chart-location").getContext("2d");

      new Chart(ctx6, {
        type: "pie",
        data: {
          labels: {!! json_encode(array_keys($grievances_district)) !!},
          datasets: [{
            label: "Grievances",
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)',
              'rgb(255, 255, 86)',
              'rgb(155, 205, 186)',
              'rgb(105, 105, 106)',
            ],
            data: {!! json_encode(array_values($grievances_district)) !!},
            hoverOffset: 4
          }],
        },
      });
    </script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('/assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>