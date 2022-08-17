@extends('backend.layouts')
@section('title')
  Employee Attendance
@endsection
@push('css')
  <style>
    .button-wrap {
      position: relative;
      text-align: center;
      top: 50%;
    }

    @media (max-width: 40em) {}

    .button-label {
      display: inline-block;
      padding: 0 5px;
      margin: 8px;
      cursor: pointer;
      color: #292929;
      border-radius: 0.25em;
      background: #efefef;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
      transition: 0.3s;
      user-select: none;
    }

    .button-label h1 {
      font-size: 1em;
      text-align: center;
      margin-top: 5px;
    }

    .button-label:hover {
      background: #d6d6d6;
      color: #101010;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32);
    }

    .button-label:active {
      transform: translateY(2px);
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0px -1px 0 rgba(0, 0, 0, 0.22);
    }


    .present:checked+.button-label {
      background: #2ecc71;
      color: #efefef;
    }

    .present:checked+.button-label:hover {
      background: #29b765;
      color: #e2e2e2;
    }

    .absent:checked+.button-label {
      background: #d91e18;
      color: #efefef;
    }

    .absent:checked+.button-label:hover {
      background: #c21b15;
      color: #e2e2e2;
    }

    .leave:checked+.button-label {
      background: #4183d7;
      color: #efefef;
    }

    .leave:checked+.button-label:hover {
      background: #2c75d2;
      color: #e2e2e2;
    }

    .hidden {
      display: none;
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

  <form
    action="{{ isset($employeeattendance) ? route('employee.attendance.update', $employeeattendance[0]['date']) : route('employee.attendance.store') }}"
    method="post">
    @csrf
    @isset($employeeattendance)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Employee Attendance</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('employee.attendance.index') }}"
                  data-toggle="tooltip"
                  title="Back to Attendances &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <form action="{{ route('employee.attendance.store') }}">
                <table id="example"
                  class="table text-center table-striped table-bordered table-hover">

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Employee List</th>
                      <th>Attendance status</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Date</label>
                          <input type="date"
                            class="form-control  @error('date') is-invalid @enderror"
                            name="date"
                            value="{{ $employeeattendance[0]['date'] ?? old('date') }}" />
                          @error('date')
                            <span class="text-danger"
                              role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </tr>
                    @if (isset($employeeattendance))
                      @foreach ($employeeattendance as $key => $attendance)
                        <tr>
                          <input type="hidden"
                            name="employee_id[]"
                            value="{{ $attendance->user->id }}">
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $attendance->user->name }}</td>
                          <td>
                            <div class="container">
                              <div class="button-wrap">
                                <input class="hidden radio-label present"
                                  type="radio"
                                  value="present"
                                  name="attend_status{{ $key }}"
                                  id="present{{ $key }}"
                                  {{ $attendance->attend_status === 'present' ? 'checked' : '' }} />
                                <label class="button-label"
                                  for="present{{ $key }}">
                                  <h1>Present</h1>
                                </label>
                                <input class="hidden radio-label leave"
                                  type="radio"
                                  value="leave"
                                  name="attend_status{{ $key }}"
                                  id="leave{{ $key }}"{{ $attendance->attend_status === 'leave' ? 'checked' : '' }} />
                                <label class="button-label"
                                  for="leave{{ $key }}">
                                  <h1>Leave</h1>
                                </label>
                                <input class="hidden radio-label absent"
                                  type="radio"
                                  value="absent"
                                  name="attend_status{{ $key }}"
                                  id="absent{{ $key }}"
                                  {{ $attendance->attend_status === 'absent' ? 'checked' : '' }} /><label
                                  class="button-label"
                                  for="absent{{ $key }}">
                                  <h1>Absent</h1>
                                </label>
                              </div>
                            </div>

                          </td>
                        </tr>
                      @endforeach
                    @else
                      @foreach ($employees as $key => $employee)
                        <tr>
                          <input type="hidden"
                            name="employee_id[]"
                            value="{{ $employee->id }}">
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $employee->name }}</td>
                          <td>
                            <div class="container">
                              <div class="button-wrap">
                                <input class="hidden radio-label present"
                                  type="radio"
                                  value="present"
                                  name="attend_status{{ $key }}"
                                  id="present{{ $key }}"
                                  checked="checked" />
                                <label class="button-label"
                                  for="present{{ $key }}">
                                  <h1>Present</h1>
                                </label>
                                <input class="hidden radio-label leave"
                                  type="radio"
                                  value="leave"
                                  name="attend_status{{ $key }}"
                                  id="leave{{ $key }}" />
                                <label class="button-label"
                                  for="leave{{ $key }}">
                                  <h1>Leave</h1>
                                </label>
                                <input class="hidden radio-label absent"
                                  type="radio"
                                  value="absent"
                                  name="attend_status{{ $key }}"
                                  id="absent{{ $key }}" /><label class="button-label"
                                  for="absent{{ $key }}">
                                  <h1>Absent</h1>
                                </label>
                              </div>
                            </div>

                          </td>
                        </tr>
                      @endforeach
                    @endif

                  </tbody>
                </table>
                <div class="float-right">
                  <div class="btn-group">
                    @if (isset($employeeattendance))
                      <button type="submit"
                        class="px-2 btn btn-primary"
                        data-toggle="tooltip"
                        title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
                    @else
                      <button type="submit"
                        class="px-4 btn btn-primary"
                        data-toggle="tooltip"
                        title="Save to database &#128190;"> <i class="bx bx-save"></i> Save</button>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
  </form>
@endsection

@push('js')
  @include('backend.partials.select2')
@endpush
