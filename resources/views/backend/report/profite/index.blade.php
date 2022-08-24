@extends('backend.layouts')
@section('title')
  Profite Calculations
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
            aria-current="page">Profite calculate</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Search data</h5>
        </div>
      </div>
    </div>
    <div class="card-body">


      <div class="form-body">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label">Start data</label>
              <input type="date"
                class="form-control  @error('start_date') is-invalid @enderror"
                name="start_date"
                id="start_date" />
              @error('start_date')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="col-form-label">End data</label>
              <input type="date"
                class="form-control  @error('end_date') is-invalid @enderror"
                name="end_date"
                id="end_date" />
              @error('end_date')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="pt-3 col-md-2 ">

            <a class="btn btn-success ProfiteSearch"
              href="javascript:;">Search</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="appendFee">
    @include('backend.report.profite.profiteajax')
  </div>
@endsection
@push('js')
  @include('backend.partials.select2')
@endpush
