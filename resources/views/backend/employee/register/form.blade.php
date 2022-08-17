@extends('backend.layouts')
@section('title')
  {{ isset($employee->id) ? 'Update employee' : 'Add employee' }}
@endsection
@push('css')
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
            aria-current="page">{{ isset($employee->id) ? 'Update employee' : 'Add employee' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form
    action="{{ isset($employee->id) ? route('employee.register.update', $employee->id) : route('employee.register.store') }}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    @isset($employee->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($employee->id) ? 'Update employee' : 'Add employee' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('employee.register.index') }}"
                  data-toggle="tooltip"
                  title="Back employees &#9194;"><i class="bx bx-rewind"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input type="text"
                      class="form-control  @error('name') is-invalid @enderror"
                      name="name"
                      value="{{ $employee->name ?? old('name') }}"
                      placeholder="name"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('name')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input type="email"
                      class="form-control  @error('email') is-invalid @enderror"
                      name="email"
                      value="{{ $employee->email ?? old('email') }}"
                      placeholder="email"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('email')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Phone</label>
                    <input type="tel"
                      class="form-control  @error('mobile') is-invalid @enderror"
                      name="mobile"
                      value="{{ $employee->mobile ?? old('mobile') }}"
                      placeholder="mobile"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('mobile')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Date of Birth</label>
                    <input type="date"
                      class="form-control  @error('date_of_birth') is-invalid @enderror"
                      name="date_of_birth"
                      value="{{ $employee->date_of_birth ?? old('date_of_birth') }}" />
                    @error('date_of_birth')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Join Date</label>
                    <input type="date"
                      class="form-control  @error('join_date') is-invalid @enderror"
                      name="join_date"
                      value="{{ $employee->join_date ?? old('join_date') }}" />
                    @error('date_of_birth')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-form-label">Address</label>
                    <input type="text"
                      class="form-control  @error('address') is-invalid @enderror"
                      name="address"
                      value="{{ $employee->address ?? old('address') }}"
                      placeholder="address"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('address')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group ">
                    <label class="col-form-label">Gender</label>
                    <select class="single-select @error('gender') is-invalid @enderror"
                      name="gender">
                      <option value="male"
                        @isset($record)  @endisset
                        {{ isset($employee) ? ($employee->gender === 'male' ? 'selected' : '') : '' }}>
                        Male</option>
                      <option value="female"
                        {{ isset($employee) ? ($employee->gender === 'female' ? 'selected' : '') : '' }}>
                        Female</option>
                      <option value="other"
                        {{ isset($employee) ? ($employee->gender === 'other' ? 'selected' : '') : '' }}>
                        Other</option>
                    </select>
                    @error('gender')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group ">
                    <label class="col-form-label">Religion</label>
                    <select class="single-select @error('religion') is-invalid @enderror"
                      name="religion">
                      <option value="Islam"
                        {{ isset($employee) ? ($employee->religion === 'Islam' ? 'selected' : '') : '' }}>
                        Islam</option>
                      <option value="Hindu"
                        {{ isset($employee) ? ($employee->religion === 'Hindu' ? 'selected' : '') : '' }}>
                        Hindu</option>
                      <option value="Buddhist"
                        {{ isset($employee) ? ($employee->religion === 'Buddhist' ? 'selected' : '') : '' }}>
                        Buddhist</option>
                      <option value="Christian"
                        {{ isset($employee) ? ($employee->religion === 'Christian' ? 'selected' : '') : '' }}>
                        Christian</option>
                      <option value="Ohter"
                        {{ isset($employee) ? ($employee->religion === 'Ohter' ? 'selected' : '') : '' }}>
                        Ohter</option>
                    </select>
                    @error('religion')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group ">
                    <label class="col-form-label">Designation</label>
                    <select class="single-select @error('designation_id') is-invalid @enderror"
                      name="designation_id">
                      @forelse ($designations as $designation)
                        <option value="{{ $designation->id }}"
                          {{ isset($employee) ? ($employee->designation->id == $designation->id ? 'selected' : '') : '' }}>
                          {{ $designation->name }}</option>
                      @empty
                      @endforelse
                    </select>
                    @error('designation_id')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Fateher Name</label>
                    <input type="text"
                      class="form-control  @error('father_name') is-invalid @enderror"
                      name="father_name"
                      value="{{ $employee->father_name ?? old('father_name') }}"
                      placeholder="Fateher name"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('father_name')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Mother Name</label>
                    <input type="text"
                      class="form-control  @error('mother_name') is-invalid @enderror"
                      name="mother_name"
                      value="{{ $employee->mother_name ?? old('mother_name') }}"
                      placeholder="mother name"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('mother_name')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Other info</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">

                <div class="col-12">
                  <div class="form-group">
                    <label class="col-form-label">Salary</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('salary') is-invalid @enderror"
                      name="salary"
                      value="{{ $employee->salary ?? old('salary') }}"
                      placeholder="Salary"
                      {{ !isset($employee) ? 'required' : '' }}>
                    @error('salary')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="col-form-label">User image</label>
                    <input type="file"
                      name="image"
                      class="dropify @error('profile_photo_path') is-invalid @enderror"
                      data-max-file-size-preview="8M"
                      @if (isset($employee->profile_photo_path)) data-default-file="/{{ $employee->profile_photo_path }}" @endif
                      data-height="160"
                      data-allowed-file-extensions="jpg jpeg png " />
                    @error('profile_photo_path')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="custom-control custom-switch">
                    <input type="checkbox"
                      {{ isset($employee) ? ($employee->status == 1 ? 'checked' : '') : '' }}
                      class="custom-control-input"
                      id="status"
                      name="status">
                    <label class="custom-control-label"
                      for="status">Status</label>
                  </div>
                </div>
              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($employee))
                    <button type="submit"
                      class="px-2 btn btn-primary"
                      data-toggle="tooltip"
                      title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
                  @else
                    <button type="submit"
                      class="px-4 btn btn-primary"
                      data-toggle="tooltip"
                      title="Save to database &#128190;"> <i class="bx bx-save"></i>Save</button>
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

@push('js')
  @include('backend.partials.select2')
  @include('backend.partials.dropify')
@endpush
