    @if (count($students) > 0)
      <table id="example"
        class="table table-striped table-bordered text-center table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Action</th>_
            <th>Name</th>
            <th>Id</th>
            <th>Roll</th>
            <th>Year</th>
            <th>Class</th>
            <th>Shift</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $key => $student)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                <a class="btn btn-sm btn-success"
                  href="{{ route('student.assingstudent.edit', $student->student_id) }}"
                  data-toggle="tooltip"
                  title="Edit &#128221"><i class="fadeIn animated bx bx-edit"></i>
                </a>

                <a class="btn btn-sm btn-info "
                  href="{{ route('student.assingstudent.promotion', $student->student_id) }}"
                  data-toggle="tooltip"
                  title="Promote student &#128221"><i class="fadeIn animated bx bx-trophy"></i>
                </a>
                <a class="btn btn-sm btn-secondary "
                  target="_blank"
                  href="{{ route('student.assingstudent.pdf', $student->student_id) }}"
                  data-toggle="tooltip"
                  title="Student information pdf &#128221"><i class="fadeIn animated bx bx-anchor"></i>
                </a>

                <form action="{{ route('student.assingstudent.destroy', $student->student_id) }}"
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
              <td>
                <div class="media align-items-center mt-3 ">
                  <img
                    @if (file_exists($student->student->profile_photo_path)) src="/{{ $student->student->profile_photo_path }}"
                @else
                src="{{ asset('images/noimg.png') }}" @endif
                    class="rounded-circle"
                    alt=""
                    width="45"
                    height="45">
                  <div class="media-body"
                    style="flex: 0.5;">

                    <p class="font-weight-bold mb-0 ml-2">{{ $student->student->name }}</p>
                  </div>
                </div>
              </td>
              <td>{{ $student->student->id_no }}</td>
              <td>{{ $student->student->id_no }}</td>
              <td>{{ $student->year->name }}</td>
              <td>{{ $student->class->name }}</td>
              <td>{{ $student->shift->name }}</td>

            </tr>
          @endforeach

        </tbody>
      </table>
    @else
      <h4 class="text-danger ">No data found</h4>
    @endif
