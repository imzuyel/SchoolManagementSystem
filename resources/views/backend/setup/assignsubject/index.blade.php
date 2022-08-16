@extends('backend.layouts')
@section('title')
  All assign subject
@endsection
@section('content')
  <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Dashboard</div>
    <div class="pl-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a>
          </li>
          <li class="breadcrumb-item active"
            aria-current="page">Assign subject</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="card-header border-bottom-0 mb-4">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage Assign Subject</h5>
        </div>
        <div class="ml-auto">

          <a class="btn btn-primary px-3"
            href="{{ route('setup.assignsubject.create') }}"
            data-toggle="tooltip"
            title="Add new assignsubject &#9989"><i class="bx bx-plus mr-1"></i>Add</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table table-striped table-bordered text-center table-hover">
          @if (count($assingnsubjects) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Class</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($assingnsubjects as $key=> $assignsubject)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $assignsubject->get_class->name }}</td>
                <td>
                  <a class="btn btn-sm btn-success"
                    href="{{ route('setup.assignsubject.edit', $assignsubject->get_class->id) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>
                  <a class="btn btn-sm btn-linkedin"
                    href="{{ route('setup.assignsubject.show', $assignsubject->get_class->id) }}"
                    data-toggle="tooltip"
                    title="Class {{ $assignsubject->get_class->name }} details &#9989"><i
                      class="fadeIn animated bx bx-show"></i>
                  </a>
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
  @include('backend.partials.dataTable')
@endpush
