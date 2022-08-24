@extends('backend.layouts')
@section('title')
  {{ isset($othercost->id) ? 'Update other cost' : 'Create othercost' }}
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
            aria-current="page">{{ isset($othercost->id) ? 'Update othercost' : 'Create othercost' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form
    action="{{ isset($othercost->id) ? route('account.othercost.update', $othercost->id) : route('account.othercost.store') }}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    @isset($othercost->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($othercost->id) ? 'Update othercost' : 'Add othercost' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('account.othercost.index') }}"
                  data-toggle="tooltip"
                  title="Back othercosts &#9194;"><i class="bx bx-rewind"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Salary</label>
                    <input type="text"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                      class="form-control  @error('amount') is-invalid @enderror"
                      name="amount"
                      value="{{ $othercost->amount ?? old('amount') }}"
                      placeholder="amount"
                      {{ !isset($othercost) ? 'required' : '' }}>
                    @error('amount')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Date</label>
                    <input type="date"
                      class="form-control  @error('date') is-invalid @enderror"
                      name="date"
                      value="{{ $othercost->date ?? old('date') }}" />
                    @error('date')
                      <span class="text-danger"
                        role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputAddress3"
                    class="form-label">Address</label>
                  <textarea class="form-control"
                    id="inputAddress3"
                    name="description"
                    placeholder="Enter Address"
                    rows="4">{{ $othercost->description ?? old('description') }}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card radius-15 border-lg-top-info">
          <div class="mb-3 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Image</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label class="col-form-label">Image</label>
                    <input type="file"
                      name="image"
                      class="dropify @error('image') is-invalid @enderror"
                      data-max-file-size-preview="8M"
                      @if (isset($othercost->image)) data-default-file="/{{ $othercost->image }}" @endif
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

              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($othercost->id))
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
  @include('backend.partials.dropify')
@endpush
