@extends('backend.layouts')
@section('title')
  All Other cost
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
            aria-current="page">Other Cost</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage other cost</h5>
        </div>
        <div class="ml-auto">

          <a class="px-3 btn btn-primary"
            href="{{ route('account.othercost.create') }}"
            data-toggle="tooltip"
            title="Add other cost &#9989"><i class="mr-1 bx bx-plus"></i>Add</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($othercosts) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($othercosts as $key=> $cost)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td> <img
                    @if (file_exists($cost->image)) src="/{{ $cost->image }}"
                @else
                src="{{ asset('images/noimg.png') }}" @endif
                    class="rounded-circle"
                    alt=""
                    width="45"
                    height="45"></td>
                <td>{{ $cost->amount }}</td>
                <td>{{ date('d M, Y', strtotime($cost->date)) }}</td>
                <td>{{ $cost->description }}</td>
                <td>
                  <a class="btn btn-sm btn-success"
                    href="{{ route('account.othercost.edit', $cost->id) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>
                  <form action="{{ route('account.othercost.destroy', $cost->id) }}"
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
  @include('backend.partials.dataTable')
@endpush
