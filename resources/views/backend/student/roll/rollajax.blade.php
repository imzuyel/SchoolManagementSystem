@if (count($students) > 0)
  <form action="{{ route('student.rollstore') }}"
    method="POST">
    @csrf
    <input type="hidden"
      name="year_id"
      value={{ $year_id }}>
    <input type="hidden"
      name="class_id"
      value={{ $class_id }}>

    <table id="example"
      class=" table table-striped table-bordered text-center table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Id</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Father name</th>
          <th>Roll</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $key => $student)
          <tr>
            <input type="hidden"
              name="student_id[]"
              value="{{ $student->student_id }}" />
            <td>{{ $key + 1 }}</td>
            <td>{{ $student->student->id_no }}</td>
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
            <td>{{ $student->student->gender }}</td>
            <td>{{ $student->student->father_name }}</td>
            <td><input type="text"
                value="{{ $student->roll }}"
                name="roll[]"></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="float-right">
      <button type="submit"
        class="btn btn-primary px-4"
        data-toggle="tooltip"
        title="Save to database &#128190;"> <i class="bx bx-save"></i>Generate</button>
    </div>
  </form>
@else
  <h4 class="text-danger ">No data found</h4>
@endif
