@extends('backend.layouts')
@section('title')
  {{ $employee->name }} salaries manage
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
            aria-current="page">{{ $employee->name }} salaries manage</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="card radius-15 border-lg-top-info">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>

          <h5> Name :<code>{{ $employee->name }}</code></h5>
          <h6>Id no :<code>{{ $employee->id_no }}</code></h6>
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
        @if (count($salaries) > 0)
          <table id="example"
            class="table text-center table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Previous Salary</th>
                <th>Increment Salary</th>
                <th>Present Salary</th>
                <th>Effected Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($salaries as $key => $salary)
                <tr>
                  <td>{{ $key + 1 }}</td>

                  <td>{{ $salary->previous_salary }}</td>
                  <td>{{ $salary->increment_salary }}</td>
                  <td>{{ $salary->present_salary }}</td>
                  <td>{{ $salary->effected_salary }}</td>

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
@endpush
