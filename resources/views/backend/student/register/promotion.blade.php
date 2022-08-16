@extends('backend.layouts')
@section('title')
  Student Promotion
@endsection

@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item"><a href="{{ route('student.assingstudent.index') }}"><i class='bx bx-trophy'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">{{ $assingstudent->student->name }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ route('student.assingstudent.promotionNew', $assingstudent->student_id) }}"
    method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Promote <code>{{ $assingstudent->student->name }}</code></h5>
              </div>
              <div class="ml-auto">

                <a class="btn btn-primary m-1"
                  href="{{ route('student.assingstudent.index') }}"
                  data-toggle="tooltip"
                  title="Back Assing Student &#9194;"><i class="bx bx-rewind"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
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
                <div class="col-md-4">
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
                <div class="col-md-5">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                <div class="ml-auto">
                  <button type="submit"
                    class="btn btn-primary px-2"
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
@push('js')
  @include('backend.partials.select2')
  @include('backend.partials.dropify')
@endpush
