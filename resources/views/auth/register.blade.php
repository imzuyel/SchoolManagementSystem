<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>School Management System </title>
  <!--favicon-->
  <link rel="icon"
    href="{{ asset('assets/images/favicon-32x32.png') }}"
    type="image/png" />
  <!-- loader-->
  <link href="assets/css/pace.min.css"
    rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
    href="assets/css/bootstrap.min.css" />
  <!-- Icons CSS -->
  <link rel="stylesheet"
    href="assets/css/icons.css" />
  <!-- App CSS -->
  <link rel="stylesheet"
    href="assets/css/app.css" />
</head>

<body class="bg-register">
  <!-- wrapper -->
  <div class="wrapper">
    <div class="section-authentication-register d-flex align-items-center justify-content-center">
      <div class="row">
        <div class="mx-auto col-12 col-lg-10">
          <div class="card radius-15">
            <div class="row no-gutters">
              <div class="col-lg-6">
                <div class="card-body p-md-5">
                  <div class="text-center">
                    <img src="{{ asset('assets/images/logo-icon.png') }}"
                      width="80"
                      alt="">
                    <h3 class="mt-4 font-weight-bold">Create an Account</h3>
                  </div>
                  <div class="mt-5 rounded shadow-sm input-group">
                    <div class="input-group-prepend"> <span
                        class="bg-transparent border-0 cursor-pointer input-group-text"><img
                          src="{{ asset('assets/images/icons/search.svg') }}"
                          alt=""
                          width="16"></span>
                    </div>
                    <a href=""
                      class="border-0 form-control "
                      value="Log in with google">Log in
                      with
                      google</a>
                  </div>
                  <div class="mt-5 rounded shadow-sm input-group">
                    <div class="input-group-prepend"> <span
                        class="bg-transparent border-0 cursor-pointer input-group-text"><img
                          src="{{ asset('assets/images/icons/github.png') }}"
                          alt=""
                          width="16"></span>
                    </div>
                    <a href=""
                      class="border-0 form-control "
                      value="Log in with google">Log in
                      with
                      github</a>
                  </div>
                  <div class="text-center login-separater"> <span>OR REGISTER WITH EMAIL</span>
                    <hr />
                  </div>
                  <form method="POST"
                    action="{{ route('register') }}"
                    method="post">
                    @csrf
                    <div class="mt-4 form-group">
                      <label>Full Name</label>
                      <input type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Full name"
                        required
                        autocomplete="name"
                        autofocus
                        :value="old('name')" />
                      @error('name')
                        <span class=" invalid-feedback"
                          role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="text"
                        class="form-control  @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="example@user.com"
                        :value="old('email')" />
                      @error('email')
                        <span class=" invalid-feedback"
                          role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <div class="input-group"
                        id="show_hide_password">
                        <input class="form-control border-right-0 @error('password') is-invalid @enderror"
                          name="password"
                          required
                          autocomplete="new-password"
                          placeholder="Password"
                          type="password">
                        <div class="input-group-append"> <a href="javascript:;"
                            class="bg-transparent input-group-text border-left-0"><i class='bx bx-hide'></i></a>
                        </div>
                        @error('password')
                          <span class="invalid-feedback"
                            role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                      </div>
                    </div>

                    <div class="form-group">
                      <label>Retype Password</label>
                      <input type="password"
                        class="form-control"
                        placeholder="Retype password"
                        name="password_confirmation"
                        required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                          class="custom-control-input"
                          id="customCheck1">
                        <label class="custom-control-label"
                          for="customCheck1">I read and agree
                          to
                          Terms & Conditions</label>
                      </div>
                    </div>
                    <div class="mt-3 btn-group w-100">
                      <button type="submit"
                        class="btn btn-primary btn-block">Register</button>
                      <button type="submit"
                        class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                      </button>
                    </div>
                  </form>
                  <hr />
                  <div class="mt-4 text-center">
                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <img src="{{ asset('assets/images/login-images/register-frent-img.jpg') }}"
                  class="card-img login-img h-100"
                  alt="...">
              </div>
            </div>
            <!--end row-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <!--Password show & hide js -->
  <script>
    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });
    });
  </script>
  @include('backend.partials.noty')
</body>

</html>
