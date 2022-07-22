@extends('backend.layouts')
@section('title')
  Details {{ $showdata[0]->get_feecategory->name }} amount
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
            aria-current="page">{{ $showdata[0]->get_feecategory->name }} amount</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="card-header border-bottom-0 mb-4">
      <div class="d-flex align-items-center">
        <div>
          <h5>Details {{ $showdata[0]->get_feecategory->name }} amount</h5>
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
      <div class="table-responsive">
        <table id="example"
          class="table table-striped table-bordered text-center table-hover">
          @if (count($showdata) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Class</th>
                <th>Amount</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($showdata as $key=> $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->get_class->name }}</td>
                <td>{{ $item->amount }}</td>
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
