@extends('backend.layouts')
@section('title')
  Employee Leave add
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
            aria-current="page">Employee Leave add</li>
        </ol>
      </nav>
    </div>
  </div>

  <form action="{{ isset($leave->id) ? route('employee.leave.update', $leave->id) : route('employee.leave.store') }}"
    method="post">
    @csrf
    @isset($leave->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Employee Leave add</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('employee.leavepurpose.index') }}"
                  data-toggle="tooltip"
                  title="Back to all leave &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group ">
                    <label class="col-form-label">Employee</label>
                    <select class="single-select @error('employee_id') is-invalid @enderror"
                      name="employee_id">
                      @forelse ($employees as $employee)
                        <option value="{{ $employee->id }}"
                          {{ isset($leave) ? ($leave->user->id == $employee->id ? 'selected' : '') : '' }}>
                          {{ $employee->name }}</option>
                      @empty
                      @endforelse
                    </select>
                    @error('employee_id')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Start Date</label>
                    <input type="date"
                      class="form-control  @error('start_date') is-invalid @enderror"
                      name="start_date"
                      value="{{ $leave->start_date ?? old('start_date') }}" />
                    @error('start_date')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group ">
                    <label class="col-form-label">Leave Purpose</label>
                    <select id="leave_purpose_id"
                      class="single-select @error('leave_purpose_id') is-invalid @enderror"
                      name="leave_purpose_id">
                      @forelse ($leavepurposes as $leavepurpose)
                        <option value="{{ $leavepurpose->id }}"
                          {{ isset($leave) ? ($leave->leavepurpose->id == $leavepurpose->id ? 'selected' : '') : '' }}>
                          {{ $leavepurpose->name }}</option>
                      @empty
                      @endforelse
                      <option value="0">New purpose</option>
                    </select>

                  </div>
                  <div class="form-group">
                    <input type="text"
                      style="display:none;"
                      class="form-control"
                      id="new_purpose"
                      name="name"
                      placeholder="New Purpose">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">End Date</label>
                    <input type="date"
                      class="form-control  @error('end_date') is-invalid @enderror"
                      name="end_date"
                      value="{{ $leave->end_date ?? old('end_date') }}" />
                    @error('end_date')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="float-right">
                    <div class="btn-group">
                      @if (isset($leave->id))
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
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
  </form>
@endsection

@push('js')
  @include('backend.partials.select2')
@endpush
