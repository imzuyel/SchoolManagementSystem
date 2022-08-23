@extends('backend.layouts')
@section('title')
  All studentfees
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
            aria-current="page">Student Fee</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage student fee</h5>
        </div>
        <div class="ml-auto">

          <a class="px-3 btn btn-primary"
            href="{{ route('account.studentfee.create') }}"
            data-toggle="tooltip"
            title="Add new studentfee &#9989"><i class="mr-1 bx bx-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($studentfees) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Class</th>
                <th>Fee type</th>
                <th>Amount</th>
                <th>Date</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($studentfees as $key=> $studentfee)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $studentfee->student->id_no }}</td>
                <td>{{ $studentfee->student->name }}</td>
                <td>{{ $studentfee->year->name }}</td>
                <td>{{ $studentfee->class->name }}</td>
                <td>{{ $studentfee->fee_category->name }}</td>
                <td>{{ $studentfee->amount }}</td>
                <td>{{ date('M Y', strtotime($studentfee->date)) }}</td>

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
