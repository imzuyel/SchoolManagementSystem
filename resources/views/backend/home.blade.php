@section('title')
  App Dashboard
@endsection
@extends('backend.layouts')
@push('css')
  <link href="{{ asset('/assets/plugins/apexcharts-bundle/css/apexcharts.css') }}"
    rel="stylesheet" />
@endpush
@section('content')
  <div class="row">
    <div class="col-12 col-lg-3">
      <div class="card radius-15 bg-voilet">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h2 class="mb-0 text-white">{{ $total_student }} </h2>
            </div>
            <div class="ml-auto text-white font-35"><i class="bx bx-user"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div>
              <p class="mb-0 text-white">Total Student</p>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-3">
      <div class="card radius-15 bg-primary-blue">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h2 class="mb-0 text-white">{{ $total_employee }} </h2>
            </div>
            <div class="ml-auto text-white font-35"><i class="bx bx-user-circle"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div>
              <p class="mb-0 text-white">Total Teacher</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-3">
      <div class="card radius-15 bg-rose">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h2 class="mb-0 text-white">{{ $group }}</h2>
            </div>
            <div class="ml-auto text-white font-35"><i class="bx bx-user-voice"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div>
              <p class="mb-0 text-white">Total Group</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-3">
      <div class="card radius-15 bg-sunset">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h2 class="mb-0 text-white">{{ $total_class }} </h2>
            </div>
            <div class="ml-auto text-white font-35"><i class="bx bx-book-open"></i>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div>
              <p class="mb-0 text-white">Total Class</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end row-->

  <div class="row">
    <div class="col-12 col-lg-4 d-flex">
      <div class="card radius-15 w-100">
        <div class="card-body">
          <div class="border shadow-none card radius-15">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">Our Employeeis</h5>
                <p class="mb-0 ms-auto"><i class="float-right bx bx-dots-horizontal-rounded font-24"></i>
                </p>
              </div>
              @foreach ($employess as $employee)
                <div class="gap-3 mt-3 d-flex align-items-center">
                  <img
                    @if (file_exists($employee->profile_photo_path)) src="/{{ $employee->profile_photo_path }}"
                   @else
                   src="{{ asset('images/noimg.png') }}" @endif
                    class="rounded-circle"
                    alt=""
                    width="45"
                    height="45">
                  <div class="flex-grow-2">
                    <p class="mb-0 ml-3 font-weight-bold">{{ $employee->name }}</p>
                  </div>

                </div>

                @if (!$loop->last)
                  <hr>
                @endif
              @endforeach

            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="mx-auto col-12 col-lg-8">
      <div class="card radius-15">
        <div class="card-body">
          <div class="card-title">
            <h4 class="mb-0">Students</h4>
          </div>
          <hr />
          <div class="card-title"></div>
          <div class="chart-container2">
            <canvas id="chart6"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end row-->
  <div class="card radius-15">
    <div class="row g-0 row-group">

      <div class="col-12 col-lg-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="media-body">
              <h4 class="mb-0 font-weight-bold text-facebook">{{ $batch }}</h4>
              <p class="mb-0">Batches</p>
            </div>
            <div class="font-40 ms-auto"><i class="bx bx-trophy text-facebook"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="media-body">
              <h4 class="mb-0 font-weight-bold text-youtube">{{ $group }}</h4>
              <p class="mb-0">Groups</p>
            </div>
            <div class="font-40 ms-auto"><i class="bx bx-user-plus text-youtube"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="media-body">
              <h4 class="mb-0 font-weight-bold text-primary-blue">{{ $shift }}</h4>
              <p class="mb-0">Shifts</p>
            </div>
            <div class="font-40 ms-auto"><i class="bx bx-user-pin text-primary-blue"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="media-body">
              <h4 class="mb-0 text-blue-600 font-weight-bold">{{ $examtype }}</h4>
              <p class="mb-0">Taken Exam</p>
            </div>
            <div class="font-40 ms-auto"><i class="text-blue-600 bx bx-book-heart"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->
  </div>

  <!--end row-->
  <div class="row">
    <div class="col-12 col-lg-12">
      <div class="card radius-15">
        <div class="card-body">
          <div id="chart2"></div>
        </div>
      </div>
    </div>
  </div>
  <!--end row-->
@endsection
@push('js')
  <script src="{{ asset('/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/chartjs/js/Chart.min.js') }}"></script>

  <script>
    $(function() {
      "use strict";
      // chart 2
      var optionsLine = {
        chart: {
          foreColor: '#9ba7b2',
          height: 420,
          type: 'line',
          zoom: {
            enabled: false
          },
          dropShadow: {
            enabled: true,
            top: 3,
            left: 2,
            blur: 4,
            opacity: 0.1,
          }
        },
        stroke: {
          curve: 'smooth',
          width: 3
        },
        colors: ['#32ab13', "#673ab7", '#f02769'],


        series: [{

            name: "Present",
            data: [
              @foreach ($employeeattendances as $key => $attendance)
                {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'present')->get()) }},
              @endforeach
            ]
          },
          {
            name: "Leave",
            data: [
              @foreach ($employeeattendances as $key => $attendance)
                {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'leave')->get()) }},
              @endforeach
            ]
          }, {
            name: "Absent",
            data: [
              @foreach ($employeeattendances as $key => $attendance)
                {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'absent')->get()) }},
              @endforeach
            ]
          }
        ],

        labels: [
          @foreach ($employeeattendances as $key => $attendance)
            "{{ date('d M ,Y', strtotime($attendance->date)) }}",
          @endforeach
        ],

        title: {
          text: 'Employee Attendance',
          align: 'left',
          offsetY: 25,
          offsetX: 20
        },
        subtitle: {
          text: 'Last {{ count($employeeattendances) }} days',
          offsetY: 55,
          offsetX: 20
        },
        markers: {
          size: 4,
          strokeWidth: 0,
          hover: {
            size: 7
          }
        },
        grid: {
          show: true,
          padding: {
            bottom: 0
          }
        },

        xaxis: {
          tooltip: {
            enabled: false
          }
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetY: -20
        }
      }
      var chartLine = new ApexCharts(document.querySelector('#chart2'), optionsLine);
      chartLine.render();
    });
  </script>

  <script>
    $(function() {
      "use strict";
      // chart 6
      new Chart(document.getElementById("chart6"), {
        type: 'doughnut',
        data: {
          labels: [
            @foreach ($classes as $class)
              "{{ $class->name }}",
            @endforeach

          ],
          datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#673ab7", "#32ab13", "#f02769", "#ffc107", "#198fed", " #2ecc71", " #76448a",
              " #2e86c1", "#DFFF00", "#DE3163", " #e59866"
            ],
            data: [
              @foreach ($classes as $class)
                {{ count($class->getclass->where('year_id', $year->id)) }},
              @endforeach
            ]
          }]
        },
        options: {
          maintainAspectRatio: false,
          title: {
            display: true,
            text: '{{ $year->name }} Year Class wise student'
          }
        }
      });

    });
  </script>
@endpush
