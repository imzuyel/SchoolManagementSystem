@section('title')
  User Profile
@endsection
@extends('backend.layouts')
@push('css')
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
  @endpus
  @section('content')
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
      <div class="breadcrumb-title pr-3">Dashboard</div>
      <div class="pl-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a>
            </li>
            <li class="breadcrumb-item active"
              aria-current="page">{{ $user->name }} Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="user-profile-page">
      <div class="card radius-15 border-lg-top-primary">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-lg-7 border-right">
              <div class="d-md-flex align-items-center">
                <div class="mb-md-0 mb-3">
                  <img
                    @if (file_exists($user->profile_photo_path)) src="/{{ $user->profile_photo_path }}"
                @else
                src="{{ asset('images/noimg.png') }}" @endif
                    alt="{{ $user->name }}"
                    class="rounded-circle shadow"
                    alt=""
                    width="130"
                    height="130">
                </div>
                <div class="ml-md-4 flex-grow-1">
                  <div class="d-flex align-items-center mb-1">
                    <h4 class="mb-0">{{ $user->name }}</h4>

                  </div>
                  <p class="mb-0 text-muted">{{ $user->user_type }}</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-5">
              <table class="table table-sm table-borderless mt-md-0 mt-3">
                <tbody>
                  <tr>
                    <th>Availability:</th>
                    <td>
                      @if ($user->status == '1')
                        <span class="badge badge-success">active</span>
                      @else
                        <span class="badge badge-warning">not active</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <th>Mobile:</th>
                    <td>{{ $user->mobile }}</td>
                  </tr>
                  <tr>
                    <th>Location:</th>
                    <td>{{ $user->address }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!--end row-->
          <ul class="nav nav-pills mt-5">
            <li class="nav-item"> <a class="nav-link active"
                id="profile-tab"
                data-toggle="tab"
                href="#Biography"><span class="p-tab-name">Biography</span><i
                  class="bx bxs-user-rectangle font-20 d-sm-none"></i></a>
            </li>
            <li class="nav-item"> <a class="nav-link"
                data-toggle="tab"
                href="#Edit-Profile"><span class="p-tab-name">Edit Profile</span><i
                  class="bx bx-message-edit font-20 d-sm-none"></i></a>
            </li>
            <li class="nav-item"> <a class="nav-link"
                data-toggle="tab"
                href="#edit-password"><span class="p-tab-name">Password change</span><i
                  class="bx bx-lock font-20 d-sm-none"></i></a>
            </li>
          </ul>
          <div class="tab-content mt-3">
            <div class="tab-pane fade show active"
              id="Biography">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body">
                      <h5 class="mb-3">{{ $user->name }} Details</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <p class="mb-0"><i class="bx bx-globe"></i> Email: <a
                            href="javascript:;">{{ $user->email }}</a>
                        </p>
                      </li>
                      <li class="list-group-item">
                        <p class="mb-0"><i class="bx bx-alarm"></i> Mobile: <a
                            href="javascript:;">{{ $user->mobile }}</a>
                        </p>
                      </li>
                      <li class="list-group-item">
                        <p class="mb-0"><i class="bx bx-images"></i> Gender: <a
                            href="javascript:;">{{ $user->gender }}</a>
                        </p>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card shadow-none border mb-0 radius-15">
                    <div class="card-body">
                      <h5 class="mb-3">About</h5>
                      <p>
                        {{ $user->about }}
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade"
              id="Edit-Profile">
              <div class="card shadow-none border mb-0 radius-15">
                <div class="card-body">
                  <form action="{{ route('user.profileupdate') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12 col-lg-6 border-right">
                          <div class="form-row">
                            <div class="form-group col-12">
                              <label>Name</label>
                              <input type="text"
                                value="{{ $user->name }}"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror">
                              @error('name')
                                <span class="text-danger"
                                  role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                              name="email"
                              value="{{ $user->email }}"
                              class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="text"
                              name="mobile"
                              value="{{ $user->mobile }}"
                              class="form-control @error('mobile') is-invalid @enderror">
                            @error('mobile')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>About</label>
                            <input type="text"
                              name="about"
                              value="{{ $user->about }}"
                              class="form-control @error('about') is-invalid @enderror">
                            @error('about')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text"
                              name="address"
                              value="{{ $user->address }}"
                              class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-body">
                                <div class="form-group ">
                                  <label>Gender</label>
                                  <select class="form-control @error('gender') is-invalid @enderror"
                                    name="gender">
                                    <option value="male"
                                      {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female"
                                      {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other"
                                      {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
                                  </select>
                                  @error('gender')
                                    <span class="text-danger"
                                      role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="col-form-label">User image</label>
                                  <input type="file"
                                    name="image"
                                    class="dropify @error('profile_photo_path') is-invalid @enderror"
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
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade"
              id="edit-password">
              <div class="card shadow-none border mb-0 radius-15">
                <div class="card-body">
                  <form action="{{ route('user.profilepasswordupdate') }}"
                    method="POST">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12  border-right">
                          <div class="form-row">
                            <div class="form-group col-12">
                              <label>Current password</label>
                              <input type="password"
                                name="old_password"
                                class="form-control @error('old_password') is-invalid @enderror">
                              @error('old_password')
                                <span class="text-danger"
                                  role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                          </div>

                          <div class="form-group">
                            <label>New Password</label>
                            <input type="password"
                              name="password"
                              class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password"
                              name="password_confirmation"
                              value=""
                              class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                              <span class="text-danger"
                                role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
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
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
