@extends('backend.layouts')
@section('title')
  All Students
@endsection
@push('css')
  <style>
    .button-wrap {
      position: relative;
      text-align: center;
      top: 50%;
    }

    @media (max-width: 40em) {}

    .button-label {
      display: inline-block;
      padding: 0 5px;
      margin: 8px;
      cursor: pointer;
      color: #292929;
      border-radius: 0.25em;
      background: #efefef;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
      transition: 0.3s;
      user-select: none;
    }

    .button-label h1 {
      font-size: 1em;
      text-align: center;
      margin-top: 5px;
    }

    .button-label:hover {
      background: #d6d6d6;
      color: #101010;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32);
    }

    .button-label:active {
      transform: translateY(2px);
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0px -1px 0 rgba(0, 0, 0, 0.22);
    }


    .pay:checked+.button-label {
      background: #2ecc71;
      color: #efefef;
    }

    .pay:checked+.button-label:hover {
      background: #29b765;
      color: #e2e2e2;
    }

    .unpay:checked+.button-label {
      background: #d91e18;
      color: #efefef;
    }

    .unpay:checked+.button-label:hover {
      background: #c21b15;
      color: #e2e2e2;
    }

    .hidden {
      display: none;
    }
  </style>
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
            aria-current="page">Students</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Search student</h5>
        </div>
      </div>
    </div>
    <div class="card-body">


      <div class="form-body">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-lg-3">
            <div class="form-group ">
              <label class="col-form-label">Year</label>
              <select class="single-select @error('year_id') is-invalid @enderror"
                name="year_id"
                id="year_id">
                @forelse ($years as $year)
                  <option value="{{ $year->id }}">{{ $year->name }}</option>
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
          <div class="col-lg-3">
            <div class="form-group ">
              <label class="col-form-label">Class</label>
              <select class="single-select @error('class_id') is-invalid @enderror"
                name="class_id"
                id="class_id">
                @forelse ($classes as $class)
                  <option value="{{ $class->id }}">{{ $class->name }}</option>
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
          <div class="col-lg-3">
            <div class="form-group ">
              <label class="col-form-label">Fee Category</label>
              <select class="single-select @error('fee_category_id') is-invalid @enderror"
                name="fee_category_id"
                id="fee_category_id">
                @forelse ($fee_categories as $fee_category)
                  <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                @empty
                @endforelse
              </select>
              @error('fee_category_id')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="col-form-label">Date</label>
              <input type="date"
                class="form-control  @error('date') is-invalid @enderror"
                name="date"
                id="date"
                value="{{ $employee->date ?? old('date') }}" />
              @error('date')
                <span class="text-danger"
                  role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="pt-3 col-md-2 ">

            <a class="btn btn-success studentFeeSearch"
              href="javascript:;">Search</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="appendStudentFee">
    @include('backend.account.studentfee.addajax')
  </div>
@endsection
@push('js')
  @include('backend.partials.select2')
@endpush
