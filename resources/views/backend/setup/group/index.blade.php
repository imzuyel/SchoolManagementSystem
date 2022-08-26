@extends('backend.layouts')
@section('title')
  All groups
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
            aria-current="page">Group</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card border-lg-top-primary radius-15">
    <div class="mb-4 card-header border-bottom-0">
      <div class="d-flex align-items-center">
        <div>
          <h5>Manage Group</h5>
        </div>
        <div class="ml-auto">

          <a class="px-3 btn btn-primary"
            href="{{ route('setup.group.create') }}"
            data-toggle="tooltip"
            title="Add Group &#9989"><i class="mr-1 bx bx-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          @if (count($groups) > 0)
            <thead>
              <tr>
                <th>#</th>
                <th>group</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          @endif
          <tbody>
            @forelse ($groups as $key=> $group)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $group->name }}</td>
                <td>
                  @if ($group->status)
                    <span class="rounded badge badge-info "
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
                    href="{{ route('setup.group.edit', $group->id) }}"
                    data-toggle="tooltip"
                    title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                  </a>
                  <form action="{{ route('setup.group.destroy', $group->id) }}"
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
