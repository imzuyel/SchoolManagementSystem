@extends('backend.layouts')
@section('title')
  Fee assign subject
@endsection
@push('css')
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
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
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Update Fee Category</h5>
              </div>
              <div class="ml-auto">

                <a class="btn btn-primary m-1"
                  href="{{ route('setup.assignsubject.index') }}"
                  data-toggle="tooltip"
                  title="Back to all assignsubjects &#9194;"><i class="bx bx-rewind"></i>Back</a>
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
                      <span class="bx bx-plus text-center btn btn-success addeventmore"></span>
                    </div>
                  @else
                    <div class="col-md-2 d-flex justify-content=-center align-items-center pt-2">
                      <span class="bx bx-minus text-center btn btn-danger removeeventmore"></span>
                    </div>
                  @endif
                </div>
              @endforeach
            </div>
            <div class="float-right">
              <div class="btn-group">
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
            <span class="bx bx-minus text-center btn btn-danger removeeventmore"></span>
          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
@push('js')
  <script>
    $('.single-select').select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: $(this).data('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
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
