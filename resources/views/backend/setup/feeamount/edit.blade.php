@extends('backend.layouts')
@section('title')
  Update Fee Amount Category
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
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">Update Fee Amount Category</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('setup.feeamount.index') }}"
                  data-toggle="tooltip"
                  title="Manage Fee Amount &#9194;"><i class="bx bx-rewind"></i></a>
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
