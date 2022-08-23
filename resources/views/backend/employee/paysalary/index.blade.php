@extends('backend.layouts')
@section('title')
  All Attendance employees
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
            aria-current="page">employees</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Search employee</h5>
        </div>
      </div>
    </div>
    <div class="card-body">


      <div class="form-body">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-md-8">
            <div class="form-group">
              <label class="col-form-label">Search Date</label>
              <input type="date"
                class="form-control  @error('date') is-invalid @enderror"
                name="date"
                id="date"
                value="{{ $leave->date ?? old('date') }}" />
              @error('date')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="pt-3 col-md-4 ">

            <a class="btn btn-success salaryPay"
              href="javascript:;">Search</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card radius-15"
    id="appendFee">
    @include('backend.employee.paysalary.paysalaryajax')

  </div>
@endsection
@push('js')
  @include('backend.partials.select2')
@endpush
