@extends('backend.layouts')
@section('title')
  {{ isset($grade->id) ? 'Update grade' : 'Create grade' }}
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
            aria-current="page">{{ isset($grade->id) ? 'Update grade' : 'Create grade' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ isset($grade->id) ? route('mark.grade.update', $grade->id) : route('mark.grade.store') }}"
    method="post">
    @csrf
    @isset($grade->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($grade->id) ? 'Update grade' : 'Create grade' }}</h5>
              </div>
              <div class="ml-auto">
                <a class="m-1 btn btn-primary"
                  href="{{ route('mark.grade.index') }}"
                  data-toggle="tooltip"
                  title="Back to all grades &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">grade Name</label>
                    <input type="text"
                      class="form-control  @error('grade_name') is-invalid @enderror"
                      name="grade_name"
                      value="{{ $grade->grade_name ?? old('grade_name') }}"
                      placeholder="grade Name"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('grade_name')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">grade Point</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('grade_point') is-invalid @enderror"
                      name="grade_point"
                      value="{{ $grade->grade_point ?? old('grade_point') }}"
                      placeholder="grade Point"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('grade_point')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Start Mark</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('start_marks') is-invalid @enderror"
                      name="start_marks"
                      value="{{ $grade->start_marks ?? old('start_marks') }}"
                      placeholder="Start marks"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('start_marks')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">End Mark</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('end_marks') is-invalid @enderror"
                      name="end_marks"
                      value="{{ $grade->end_marks ?? old('end_marks') }}"
                      placeholder="End marks"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('end_marks')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Start Point</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('start_point') is-invalid @enderror"
                      name="start_point"
                      value="{{ $grade->start_point ?? old('start_point') }}"
                      placeholder="Start point"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('start_point')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">End Point</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('end_point') is-invalid @enderror"
                      name="end_point"
                      value="{{ $grade->end_point ?? old('end_point') }}"
                      placeholder="End point"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('end_point')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Remark</label>
                    <input type="text"
                      class="form-control  @error('remarks') is-invalid @enderror"
                      name="remarks"
                      value="{{ $grade->remarks ?? old('remarks') }}"
                      placeholder="remarks"
                      {{ !isset($grade) ? 'required' : '' }}>
                    @error('remarks')
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
                  @if (isset($grade->id))
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
