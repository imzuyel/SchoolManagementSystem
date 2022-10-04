@extends('backend.layouts')
@section('title')
  All Employees
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
            aria-current="page">Employees</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="card radius-15 border-lg-top-info">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>

          <h5>All Employees</h5>
        </div>
        <div class="ml-auto">
          <a class="px-3 btn btn-primary"
            href="{{ route('employee.register.create') }}"
            data-toggle="tooltip"
            title="Add new employee &#9989"><i class="mr-1 bx bx-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if (count($employees) > 0)
          <table id="example"
            class="table text-center table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Action</th>_
                <th>Name</th>
                <th>Id</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Joing Date</th>
                <th>Salary</th>
                <th>Code</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $key => $employee)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>
                    <a class="btn btn-sm btn-success"
                      href="{{ route('employee.register.edit', $employee->id) }}"
                      data-toggle="tooltip"
                      title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                    </a>
                    <a class="btn btn-sm btn-facebook"
                      href="{{ route('employee.register.show', $employee->id) }}"
                      data-toggle="tooltip"
                      target="_blank"
                      title="Details &#128190"><i class="fadeIn animated bx bx-show-alt"></i>
                    </a>
                    <form action="{{ route('employee.register.destroy', $employee->id) }}"
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
                  <td>
                    <div class=" media align-items-center">
                      <img
                        @if (file_exists($employee->profile_photo_path)) src="/{{ $employee->profile_photo_path }}"
                @else
                src="{{ asset('images/noimg.png') }}" @endif
                        class="rounded-circle"
                        alt=""
                        width="45"
                        height="45">
                      <div class="media-body"
                        style="flex: 0.5;">

                        <p class="mb-0 ml-2 font-weight-bold">{{ $employee->name }}</p>
                      </div>
                    </div>
                  </td>
                  <td>{{ $employee->id_no }}</td>
                  <td>{{ $employee->mobile }}</td>
                  <td>{{ $employee->gender }}</td>
                  <td>{{ $employee->join_date }}</td>
                  <td>{{ $employee->salary }}</td>
                  <td>{{ $employee->code }}</td>

                </tr>
              @endforeach

            </tbody>
          </table>
        @else
          <h4 class="text-danger ">No data found</h4>
        @endif

      </div>
    </div>
  </div>
@endsection
@push('js')
  @include('backend.partials.dataTable')
  @include('backend.partials.select2')
  @include('backend.partials.dropify')
@endpush
