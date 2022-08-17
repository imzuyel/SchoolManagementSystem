@extends('backend.layouts')
@section('title')
  All Employee Attendances
@endsection

@section('content')
  <div class="mb-3 page-breadcrumb d-none d-md-flex align-items-center">
    <div class="pr-3 breadcrumb-title">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="p-0 mb-0 breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">Employee Attendance</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Employee Attendance</h5>
        </div>
        <div class="ml-auto">
          <a class="px-3 btn btn-primary"
            href="{{ route('employee.attendance.create') }}"
            data-toggle="tooltip"
            title="Add new Attendance &#9989"><i class="mr-1 bx bx-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div>
          <p>Date <code>{{ date('d M,Y', strtotime($employeeattendances[0]['date'])) }}</code> Attendance</p>
        </div>
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($employeeattendances) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Attendance status</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($employeeattendances as $key=> $attendance)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $attendance->user->id_no }}</td>
                <td>{{ $attendance->user->name }}</td>

                <td>
                  @if ($attendance->attend_status === 'present')
                    <span class="badge badge-success">{{ $attendance->attend_status }}</span>
                  @elseif ($attendance->attend_status === 'leave')
                    <span class="badge badge-info">{{ $attendance->attend_status }}</span>
                  @else
                    <span class="badge badge-danger">{{ $attendance->attend_status }}</span>
                  @endif
                </td>

              </tr>
            @empty
              <h4 class="text-danger ">No data found</h4>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('js')
  @include('backend.partials.dataTable')
@endpush
