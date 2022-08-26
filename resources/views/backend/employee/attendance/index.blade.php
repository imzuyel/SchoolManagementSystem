@extends('backend.layouts')
@section('title')
  All Employee Attendances
@endsection
@push('css')
  <style>
    .attendance {
      position: relative;
      top: -7px;
      left: -3px;
      border-radius: 50%;
      font-size: 10px;
      width: 14px;
      height: 14px;
      line-height: 11px;
    }
  </style>
@endpush
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
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($employeeattendances) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Attendance count</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($employeeattendances as $key=> $attendance)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ date('d M ,Y', strtotime($attendance->date)) }}</td>
                <td>
                  <span class="badge badge-success">present</span><span class="badge badge-primary attendance">
                    {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'present')->get()) }}
                  </span>

                  <span class="badge badge-info">leave</span><span class="badge badge-primary attendance">
                    {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'leave')->get()) }}
                  </span>
                  <span class="badge badge-danger">Absent</span><span class="badge badge-primary attendance">
                    {{ count(App\Models\Employeeattendance::where('date', $attendance->date)->where('attend_status', 'absent')->get()) }}
                  </span>
                </td>
                <td>
                  <a class="btn btn-sm btn-success"
                    href="{{ route('employee.attendance.edit', $attendance->date) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>

                  <a class="btn btn-sm btn-facebook"
                    href="{{ route('employee.attendance.show', $attendance->date) }}"
                    data-toggle="tooltip"
                    title="Details &#128221"><i class="fadeIn animated bx bx-show-alt"></i>
                  </a>
                  <form action="#"
                    style="display: inline-block"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger delete-confirm"
                      type="submit"
                      data-toggle="tooltip"
                      title="Delete &#128683">
                      <i class="fadeIn animated bx bx-trash"></i>
                    </button>
                  </form>

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
