@extends('backend.layouts')
@section('title')
  Fee amount edit
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
            Update Fee Amount Category
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ route('setup.feeamount.update', $editData[0]->fee_category_id) }} "
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
                  href="{{ route('setup.feeamount.index') }}"
                  data-toggle="tooltip"
                  title="Back to all feeamounts &#9194;"><i class="bx bx-rewind"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body add_item">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Fee Category</label>
                    <select class="single-select"
                      name="fee_category_id">
                      @foreach ($feecategories as $feecategory)
                        <option value="{{ $feecategory->id }}"
                          {{ $editData[0]->fee_category_id == $feecategory->id ? 'selected' : '' }}>
                          {{ $feecategory->name }}
                        </option>
                      @endforeach

                    </select>
                  </div>
                </div>
              </div>
              @foreach ($editData as $item)
                <div class="row delete_whole_extra_item">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Student Class</label>
                      <select class="form-control"
                        id="class-select"
                        name="class_id[]">
                        @foreach ($classes as $class)
                          <option value="{{ $class->id }}"
                            {{ $item->class_id == $class->id ? ' selected="selected"' : '' }}>{{ $class->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Amount</label>
                      <input type="number"
                        class="form-control  @error('amount') is-invalid @enderror"
                        name="amount[]"
                        placeholder="amount"
                        value="{{ $item->amount }}">
                      @error('amount')
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
          <div class="col-md-5">
            <div class="form-group">
              <label>Student Class</label>
              <select class="form-control"
                name="class_id[]">
                @foreach ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>Amount</label>
              <input type="number"
                class="form-control  @error('amount') is-invalid @enderror"
                name="amount[]"
                placeholder="amount"
                {{ !isset($user) ? 'required' : '' }}>
              @error('amount')
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
