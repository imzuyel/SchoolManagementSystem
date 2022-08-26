@extends('backend.layouts')
@section('title')
  Details {{ $showdata[0]->get_class->name }} Subject
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
            aria-current="page">{{ $showdata[0]->get_class->name }} Assign Subject</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Class <code>{{ $showdata[0]->get_class->name }}</code> subject</h5>
        </div>
        <div class="ml-auto">
          <a class="m-1 btn btn-primary"
            href="{{ route('setup.assignsubject.index') }}"
            data-toggle="tooltip"
            title="Manage Assign Subjects &#9194;"><i class="bx bx-rewind"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($showdata) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Full mark</th>
                <th>Pass mark</th>
                <th>Subjective mark</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($showdata as $key=> $item)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->get_subject->name }}</td>
                <td>{{ $item->full_mark }}</td>
                <td>{{ $item->pass_mark }}</td>
                <td>{{ $item->subjective_mark }}</td>
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
  @include('backend.partials.dataTable')
@endpush
