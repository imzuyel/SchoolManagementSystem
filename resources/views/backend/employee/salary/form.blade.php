@extends('backend.layouts')
@section('title')
  Salary increment
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
            aria-current="page">Salary increment</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ route('employee.salary.update', $employee->id) }}"
    method="post">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Salary increment</h5>
              </div>
              <div class="ml-auto">
                <a class="m-1 btn btn-primary"
                  href="{{ route('employee.salary.index') }}"
                  data-toggle="tooltip"
                  title="Back Employee salary &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Incriment</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('name') is-invalid @enderror"
                      name="increment_salary"
                      placeholder="Increment amount"
                      {{ !isset($shift) ? 'required' : '' }}>
                    @error('increment_salary')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Effected Date</label>
                    <input type="date"
                      class="form-control  @error('effected_salary') is-invalid @enderror"
                      name="effected_salary" />
                    @error('date_of_birth')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="float-right">
                <div class="btn-group">
                  <button type="submit"
                    class="px-2 btn btn-primary"
                    data-toggle="tooltip"
                    title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
@endsection
