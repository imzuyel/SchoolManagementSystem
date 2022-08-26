@extends('backend.layouts')
@section('title')
  {{ isset($assingstudent->id) ? 'Update student' : 'Add student' }}
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
            aria-current="page">{{ isset($assingstudent->id) ? 'Update student' : 'Add student' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form
    action="{{ isset($assingstudent->id) ? route('student.assingstudent.update', $assingstudent->student->id) : route('student.assingstudent.store') }}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    @isset($assingstudent->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($assingstudent->id) ? 'Update student' : 'Add student' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('student.assingstudent.index') }}"
                  data-toggle="tooltip"
                  title="Manage Student &#9194;"><i class="bx bx-rewind"></i></a>
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
                      value="{{ $assingstudent->student->name ?? old('name') }}"
                      placeholder="name"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
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
                      value="{{ $assingstudent->student->email ?? old('email') }}"
                      placeholder="email"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
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
                      value="{{ $assingstudent->student->mobile ?? old('mobile') }}"
                      placeholder="mobile"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
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
                      value="{{ $assingstudent->student->date_of_birth ?? old('date_of_birth') }}" />
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
                    <label class="col-form-label">Address</label>
                    <input type="text"
                      class="form-control  @error('address') is-invalid @enderror"
                      name="address"
                      value="{{ $assingstudent->student->address ?? old('address') }}"
                      placeholder="address"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
                    @error('address')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group ">
                    <label class="col-form-label">Gender</label>
                    <select class="single-select @error('gender') is-invalid @enderror"
                      name="gender">
                      <option value="male"
                        @isset($record)  @endisset
                        {{ isset($assingstudent) ? ($assingstudent->student->gender === 'male' ? 'selected' : '') : '' }}>
                        Male</option>
                      <option value="female"
                        {{ isset($assingstudent) ? ($assingstudent->student->gender === 'female' ? 'selected' : '') : '' }}>
                        Female</option>
                      <option value="other"
                        {{ isset($assingstudent) ? ($assingstudent->student->gender === 'other' ? 'selected' : '') : '' }}>
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
                <div class="col-md-5">
                  <div class="form-group ">
                    <label class="col-form-label">Religion</label>
                    <select class="single-select @error('religion') is-invalid @enderror"
                      name="religion">
                      <option value="Islam"
                        {{ isset($assingstudent) ? ($assingstudent->student->religion === 'Islam' ? 'selected' : '') : '' }}>
                        Islam</option>
                      <option value="Hindu"
                        {{ isset($assingstudent) ? ($assingstudent->student->religion === 'Hindu' ? 'selected' : '') : '' }}>
                        Hindu</option>
                      <option value="Buddhist"
                        {{ isset($assingstudent) ? ($assingstudent->student->religion === 'Buddhist' ? 'selected' : '') : '' }}>
                        Buddhist</option>
                      <option value="Christian"
                        {{ isset($assingstudent) ? ($assingstudent->student->religion === 'Christian' ? 'selected' : '') : '' }}>
                        Christian</option>
                      <option value="Ohter"
                        {{ isset($assingstudent) ? ($assingstudent->student->religion === 'Ohter' ? 'selected' : '') : '' }}>
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Discount %</label>
                    <input type="text"
                      class="form-control  @error('discount') is-invalid @enderror"
                      name="discount"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      value="{{ $assingstudent->discount->discount ?? old('discount') }}"
                      placeholder="discount"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
                    @error('discount')
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
                      value="{{ $assingstudent->student->father_name ?? old('father_name') }}"
                      placeholder="Fateher name"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
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
                      value="{{ $assingstudent->student->mother_name ?? old('mother_name') }}"
                      placeholder="mother name"
                      {{ !isset($assingstudent) ? 'required' : '' }}>
                    @error('mother_name')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group ">
                    <label class="col-form-label">Year</label>
                    <select class="single-select @error('year_id') is-invalid @enderror"
                      name="year_id">
                      @forelse ($years as $year)
                        <option value="{{ $year->id }}"
                          {{ isset($assingstudent) ? ($assingstudent->year->id == $year->id ? 'selected' : '') : '' }}>
                          {{ $year->name }}</option>
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
                <div class="col-md-6">
                  <div class="form-group ">
                    <label class="col-form-label">Class</label>
                    <select class="single-select @error('class_id') is-invalid @enderror"
                      name="class_id">
                      @forelse ($classes as $class)
                        <option value="{{ $class->id }}"
                          {{ isset($assingstudent) ? ($assingstudent->class->id == $class->id ? 'selected' : '') : '' }}>
                          {{ $class->name }}</option>
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
                  <div class="form-group ">
                    <label class="col-form-label">Shift</label>
                    <select class="single-select @error('shift_id') is-invalid @enderror"
                      name="shift_id">
                      @forelse ($shifts as $shift)
                        <option
                          {{ isset($assingstudent) ? ($assingstudent->shift->id == $shift->id ? 'selected' : '') : '' }}
                          value="{{ $shift->id }}">{{ $shift->name }}</option>
                      @empty
                      @endforelse
                    </select>
                    @error('shift_id')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group ">
                    <label class="col-form-label">Group</label>
                    <select class="single-select @error('group_id') is-invalid @enderror"
                      name="group_id">
                      @forelse ($groups as $group)
                        <option
                          {{ isset($assingstudent) ? ($assingstudent->group->id == $group->id ? 'selected' : '') : '' }}
                          value="{{ $group->id }}">{{ $group->name }}</option>
                      @empty
                      @endforelse
                    </select>
                    @error('group_id')
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
                      @if (isset($assingstudent->student->profile_photo_path)) data-default-file="/{{ $assingstudent->student->profile_photo_path }}" @endif
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
                      {{ isset($assingstudent) ? ($assingstudent->student->status == 1 ? 'checked' : '') : '' }}
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
                  @if (isset($assingstudent))
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
