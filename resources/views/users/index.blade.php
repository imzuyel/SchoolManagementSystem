@extends('backend.layouts')
@section('title')
  All User
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
            aria-current="page">User</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage Users</h5>
        </div>
        <div class="ml-auto">

          <a class="px-3 btn btn-primary"
            href="{{ route('user.create') }}"
            data-toggle="tooltip"
            title="Add New User &#9989"><i class="mr-1 bx bx-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($users) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>Code</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif

          <tbody>
            @forelse ($users as $key=> $user)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-center">
                  <div class="bg-transparent border product-img">
                    <img
                      @if (file_exists($user->profile_photo_path)) src="/{{ $user->profile_photo_path }}"
                @else
                src="{{ asset('images/noimg.png') }}" @endif
                      alt="{{ $user->name }}"
                      width="45">
                  </div>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->user_type }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->code }}</td>
                <td>
                  <a class="btn btn-sm btn-success"
                    href="{{ route('user.edit', $user->id) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>


                  <form action="{{ route('user.destroy', $user->id) }}"
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
