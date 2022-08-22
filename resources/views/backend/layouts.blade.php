<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token"
    content="{{ csrf_token() }}" />
  <title>{{ config('app.name') }} | @yield('title')</title>

  <!--favicon-->
  @include('backend.partials.css')



  @stack('css')

</head>

<body>
  <div class="wrapper">
    <img class="centered"
      src="{{ asset('images/ajax-loader.gif') }}"
      alt="">
    <!--sidebar-wrapper-->
    @include('backend.partials.sidebar')
    <!--end sidebar-wrapper-->

    <!--header-->
    @include('backend.partials.header')
    <!--end header-->

    <!--page-wrapper-->
    <div class="page-wrapper">
      <div class="page-content-wrapper">
        <div class="page-content">
          @yield('content')
        </div>
      </div>
    </div>
    <!--end page-wrapper-->

    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;"
      class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--footer -->
    {{-- @include('backend.partials.footer') --}}
    <!-- end footer -->
  </div>

  <!--start switcher-->
  {{-- @include('backend.partials.switcher') --}}
  <!--end switcher-->

  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  @include('backend.partials.toastr')
  <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
  <!--plugins-->
  <script src="{{ asset('/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

  <!-- Delete JS -->
  @include('backend.partials.sweetalert2')
  @include('backend.partials.js')
  @stack('js')
  <!-- App JS -->

  <script src="{{ asset('/assets/js/app.js') }}"></script>
</body>

</html>
