@extends('backend.layouts')
@section('title')
  Details {{ $showdata[0]->get_feecategory->name }} amount
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
  @include('backend.partials.dataTable')
@endpush
