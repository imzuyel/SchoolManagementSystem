@extends('backend.layouts')
@section('title')
  {{ isset($shift->id) ? 'Update shift' : 'Add Shift' }}
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
            aria-current="page">{{ isset($shift->id) ? 'Update shift' : 'Add Shift' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ isset($shift->id) ? route('setup.shift.update', $shift->id) : route('setup.shift.store') }}"
    method="post">
    @csrf
    @isset($shift->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($shift->id) ? 'Update shift' : 'Add Shift' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('setup.shift.index') }}"
                  data-toggle="tooltip"
                  title="Manage Shift &#9194;"><i class="bx bx-rewind"></i></a>
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
                  value="{{ $shift->name ?? old('name') }}"
                  placeholder="name"
                  {{ !isset($shift) ? 'required' : '' }}>
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
                  @isset($shift->id) {{ $shift->status == 1 ? 'checked' : '' }} @endisset>
                <label class="custom-control-label"
                  for="status">Status</label>
              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($shift->id))
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
  </form>
@endsection
