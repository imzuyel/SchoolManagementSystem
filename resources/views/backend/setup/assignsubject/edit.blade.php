@extends('backend.layouts')
@section('title')
  Update Assign Subject
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
            aria-current="page">
            Update Assign Subject
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ route('setup.assignsubject.update', $editData[0]->class_id) }} "
    method="post">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0"> Update Assign Subject</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('setup.assignsubject.index') }}"
                  data-toggle="tooltip"
                  title="Manage Assing Subject &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body add_item">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Class</label>
                    <select class="single-select"
                      name="class_id">
                      @foreach ($classes as $class)
                        <option value="{{ $class->id }}"
                          {{ $editData[0]->class_id == $class->id ? 'selected' : '' }}>
                          {{ $class->name }}
                        </option>
                      @endforeach

                    </select>
                  </div>
                </div>

              </div>
              @foreach ($editData as $item)
                <div class="row delete_whole_extra_item">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Student Subject</label>
                      <select class="form-control"
                        id="class-select"
                        name="subject_id[]">
                        @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}"
                            {{ $item->subject_id == $subject->id ? ' selected="selected"' : '' }}>{{ $subject->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Full mark</label>
                      <input type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                        class="form-control  @error('full_mark') is-invalid @enderror"
                        name="full_mark[]"
                        value={{ $item->full_mark }}
                        placeholder="Full mark">
                      @error('full_mark')
                        <span class="text-danger"
                          role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label> Pass mark</label>
                      <input type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                        class="form-control  @error('pass_mark') is-invalid @enderror"
                        name="pass_mark[]"
                        value={{ $item->pass_mark }}
                        placeholder="Pass mark">
                      @error('pass_mark')
                        <span class="text-danger"
                          role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label> Subjective mark</label>
                      <input type="text"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                        class="form-control  @error('subjective_mark') is-invalid @enderror"
                        name="subjective_mark[]"
                        value={{ $item->subjective_mark }}
                        placeholder="Subject mark">
                      @error('subjective_mark')
                        <span class="text-danger"
                          role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  @if ($loop->first)
                    <div class="col-md-2 d-flex justify-content=-center align-items-center pt-2">
                      <span class="text-center bx bx-plus btn btn-success addeventmore"></span>
                    </div>
                  @else
                    <div class="col-md-2 d-flex justify-content=-center align-items-center pt-2">
                      <span class="text-center bx bx-minus btn btn-danger removeeventmore"></span>
                    </div>
                  @endif
                </div>
              @endforeach
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
  </form>
  <div style="visibility:hidden">
    <div class="whole_extra_item_add"
      id="whole_extra_item_add">
      <div class="delete_whole_extra_item"
        id="delete_whole_extra_item">

        <div class="row">

          <div class="col-md-3">
            <div class="form-group">
              <label>Student subject</label>
              <select class="form-control"
                id="subject-select"
                name="subject_id[]">
                @foreach ($subjects as $subject)
                  <option value="{{ $subject->id }}"
                    c>{{ $subject->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Full mark</label>
              <input type="text"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                class="form-control  @error('full_mark') is-invalid @enderror"
                name="full_mark[]"
                placeholder="Full mark">
              @error('full_mark')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label> Pass mark</label>
              <input type="text"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                class="form-control  @error('pass_mark') is-invalid @enderror"
                name="pass_mark[]"
                placeholder="Pass mark">
              @error('pass_mark')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label> Subjective mark</label>
              <input type="text"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                class="form-control  @error('subjective_mark') is-invalid @enderror"
                name="subjective_mark[]"
                placeholder="Subject mark">
              @error('subjective_mark')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-2 d-flex justify-content=-center align-items-center pt-2">
            <span class="text-center bx bx-minus btn btn-danger removeeventmore"></span>
          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
@push('js')
  @include('backend.partials.select2')
  <script>
    $(document).ready(function() {
      $(document).on('click', '.addeventmore', function() {
        var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest('.add_item').append(whole_extra_item_add);
      });
      $(document).on('click', '.removeeventmore', function(event) {
        $(this).closest(".delete_whole_extra_item").remove();
      });
    });
  </script>
@endpush
