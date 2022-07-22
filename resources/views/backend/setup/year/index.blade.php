@extends('backend.layouts')
@section('title')
  All Years
@endsection
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet"
    href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
            aria-current="page">Student Class</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="card-header border-bottom-0 mb-4">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage Year</h5>
        </div>
        <div class="ml-auto">

          <a class="btn btn-primary px-3"
            href="{{ route('setup.year.create') }}"
            data-toggle="tooltip"
            title="Add new Year &#9989"><i class="bx bx-plus mr-1"></i>Add</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table table-striped table-bordered text-center table-hover">
          @if (count($years) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Year</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($years as $key=> $year)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $year->name }}</td>
                <td>
                  @if ($year->status)
                    <span class="badge badge-info rounded "
                      data-toggle="tooltip"
                      title="Class status is true &#128077">Active</span>
                  @else
                    <span class="badge badge-danger"
                      data-toggle="tooltip"
                      title="Class status is false &#128078">Inactive</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-sm btn-success"
                    href="{{ route('setup.year.edit', $year->id) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>
                  <form action="{{ route('setup.year.destroy', $year->id) }}"
                    style="display: inline-block"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger delete-confirm"
                      type="submit"
                      data-toggle="tooltip"
                      title="Delete &#128683">
                      <i class="fadeIn animated bx bx-trash"></i>
                    </button>
                  </form>

                </td>
              </tr>

            @empty
              <h4 class="text-danger ">No data found</h4>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <!--Data Tables js-->
  <!-- DataTables  & Plugins -->

  <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script>
    $(function() {
      $("#example").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["pdf", "print"],
        "bDestroy": true,
      }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

    });
  </script>
@endpush
