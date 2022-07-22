@extends('backend.layouts')
@section('title')
  {{ isset($year->id) ? 'Update Year' : 'Create year' }}
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
            aria-current="page">{{ isset($year->id) ? 'Update year' : 'Create year' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ isset($year->id) ? route('setup.year.update', $year->id) : route('setup.year.store') }}"
    method="post">
    @csrf
    @isset($year->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($year->id) ? 'Update Year' : 'Create Year' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="btn btn-primary m-1"
                  href="{{ route('setup.year.index') }}"
                  data-toggle="tooltip"
                  title="Back to all years &#9194;"><i class="bx bx-rewind"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="form-group">
                <label class="col-form-label">Name</label>
                <input type="text"
                  class="form-control  @error('name') is-invalid @enderror"
                  name="name"
                  value="{{ $year->name ?? old('name') }}"
                  placeholder="name"
                  {{ !isset($year) ? 'required' : '' }}>
                @error('name')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox"
                  class="custom-control-input"
                  id="status"
                  name="status"
                  @isset($year->id) {{ $year->status == 1 ? 'checked' : '' }} @endisset>
                <label class="custom-control-label"
                  for="status">Status</label>
              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($year->id))
                    <button type="submit"
                      class="btn btn-primary px-2"
                      data-toggle="tooltip"
                      title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
                  @else
                    <button type="submit"
                      class="btn btn-primary px-4"
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
  </form>
@endsection
