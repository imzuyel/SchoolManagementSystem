@extends('backend.layouts')
@section('title')
  {{ isset($user->id) ? 'Update User' : 'Create User' }}
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
          <div class="mb-4 card-header border-bottom-0">
            <div class="d-flex align-items-center">
              <div>
                <h5 class="mb-lg-0">{{ isset($user->id) ? 'Update user' : 'Create user' }}</h5>
              </div>
              <div class="ml-auto">

                <a class="m-1 btn btn-primary"
                  href="{{ route('user.index') }}"
                  data-toggle="tooltip"
                  title="Back to all users &#9194;"><i class="bx bx-rewind"></i></a>
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
                  <option value="operator"
                    @if (isset($user->user_type) && $user->user_type == 'operator') selected="selected" @endif>Operator</option>
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
                    placeholder="password">
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
          <div class="mb-4 card-header border-bottom-0">
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
@push('js')
  @include('backend.partials.select2')
  @include('backend.partials.dropify')
@endpush
