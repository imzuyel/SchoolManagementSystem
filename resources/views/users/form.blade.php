@extends('backend.layouts')
@section('title')
  {{ isset($user->id) ? 'Update User' : 'Create User' }}
@endsection
@push('css')
  <link href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}"
    rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/select2/css/select2-bootstrap4.css') }}"
    rel="stylesheet" />
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
            aria-current="page">{{ isset($user->id) ? 'Update user' : 'Create User' }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <form action="{{ isset($user->id) ? route('user.update', $user->id) : route('user.store') }}"
    method="post"
    enctype="multipart/form-data">
    @csrf
    @isset($user->id)
      @method('PUT')
    @endisset
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card radius-15 border-lg-top-info">
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($user->id) ? 'Update user' : 'Create user' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="btn btn-primary m-1"
                  href="{{ route('user.index') }}"
                  data-toggle="tooltip"
                  title="Back to all users &#9194;"><i class="bx bx-rewind"></i>Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="form-group">
                <label>User Type</label>
                <select class="single-select"
                  name="user_type"
                  {{ !isset($user) ? 'required' : '' }}>
                  <option value="admin"
                    @if (isset($user->user_type) && $user->user_type == 'admin') selected="selected" @endif>Admin</option>
                  <option value="user"
                    @if (isset($user->user_type) && $user->user_type == 'user') selected="selected" @endif>User</option>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Name</label>
                <input type="text"
                  class="form-control  @error('name') is-invalid @enderror"
                  name="name"
                  value="{{ $user->name ?? old('name') }}"
                  placeholder="name"
                  {{ !isset($user) ? 'required' : '' }}>
                @error('name')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label class="col-form-label">Email</label>
                <input type="email"
                  class="form-control  @error('email') is-invalid @enderror"
                  name="email"
                  value="{{ $user->email ?? old('email') }}"
                  placeholder="email"
                  {{ !isset($user) ? 'required' : '' }}>
                @error('email')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              @if (!isset($user->password))
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input type="password"
                    class="form-control  @error('password') is-invalid @enderror"
                    name="password"
                    value="{{ $user->password ?? old('password') }}"
                    placeholder="password"
                    {{ !isset($user) ? 'required' : '' }}>
                  @error('password')
                    <span class="text-danger"
                      role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card radius-15 border-lg-top-info">
          <div class="card-header border-bottom-0 mb-4">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-0">Other info</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="form-body">
              <div class="form-group">
                <label class="col-form-label">User image</label>
                <input type="file"
                  name="image"
                  class="dropify @error('image') is-invalid @enderror"
                  data-max-file-size-preview="8M"
                  @if (isset($user->profile_photo_path)) data-default-file="/{{ $user->profile_photo_path }}" @endif
                  data-height="160"
                  data-allowed-file-extensions="jpg jpeg png " />
                @error('profile_photo_path')
                  <span class="text-danger"
                    role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="float-right">
                <div class="btn-group">
                  @if (isset($user->id))
                    <button type="submit"
                      class="btn btn-primary px-2"
                      data-toggle="tooltip"
                      title="Update These data &#128190;"><i class="bx bx-task"></i> Update</button>
                  @else
                    <button type="submit"
                      class="btn btn-primary px-4"
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
@push('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous"></script>
  <script src="/assets/plugins/select2/js/select2.min.js"></script>
  <script>
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
      }
    });
    $('.single-select').select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: $(this).data('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  </script>
@endpush
