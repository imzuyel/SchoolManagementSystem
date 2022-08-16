@extends('backend.layouts')
@section('title')
  All Students
@endsection

@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">Students</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="card-header border-bottom-0 mb-4">
      <div class="d-flex align-items-center">
        <div>
          <h5>Search student</h5>
        </div>
      </div>
    </div>
    <div class="card-body">


      <div class="form-body">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-md-4">
            <div class="form-group ">
              <label class="col-form-label">Year</label>
              <select class="single-select @error('year_id') is-invalid @enderror"
                name="year_id"
                id="year_id">
                @forelse ($years as $year)
                  <option value="{{ $year->id }}">{{ $year->name }}</option>
                @empty
                @endforelse
              </select>
              @error('year_id')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group ">
              <label class="col-form-label">Class</label>
              <select class="single-select @error('class_id') is-invalid @enderror"
                name="class_id"
                id="class_id">
                @forelse ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                @empty
                @endforelse
              </select>
              @error('class_id')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4 pt-3 ">

            <a class="btn btn-success searchStudent"
              href="javascript:;">Search</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card radius-15">
    <div class="card-header border-bottom-0 mb-4">
      <div class="d-flex align-items-center">
        <div>
          @if (isset($yearname))
            <h5> <code>{{ $yearname->name }}</code> class <code>{{ $classname->name }}</code> students</h5>
          @else
            <h5>All student</h5>
          @endif

        </div>
        <div class="ml-auto">
          <a class="btn btn-primary px-3"
            href="{{ route('student.assingstudent.create') }}"
            data-toggle="tooltip"
            title="Add new student &#9989"><i class="bx bx-plus mr-1"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive"
        id="assingStudent1">
        @include('backend.student.register.ajax')
      </div>
    </div>
  </div>
@endsection
@push('js')
  @include('backend.partials.dataTable')
  @include('backend.partials.select2')
  @include('backend.partials.dropify')
@endpush
