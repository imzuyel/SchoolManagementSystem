@if (count($students) > 0)

  <input type="hidden"
    name="year_id"
    value={{ $year_id }}>
  <input type="hidden"
    name="class_id"
    value={{ $class_id }}>

  <table id="example"
    class="table text-center table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Id</th>
        <th>Student</th>
        <th>Roll</th>
        <th>Registration Fee</th>
        <th>Discount</th>
        <th>Total Registration Fee</th>
        <th>Action</th>
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
            <div class="mt-3 media align-items-center ">
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
                <p class="mb-0 ml-2 font-weight-bold">{{ $student->student->name }}</p>
              </div>
            </div>
          </td>
          <td>{{ $student->roll }}</td>
          <td>{{ $feecategoryamount->amount }}</td>
          <td>{{ $student->discount->discount }} %</td>
          <td>{{ $feecategoryamount->amount - ($student->discount->discount / 100) * $feecategoryamount->amount }}
          </td>
          <td>
            <a class="btn btn-sm btn-success"
              target="_blank"
              href="{{ route('student.regfeepdf', [$student->student_id, $class_id]) }}"
              data-toggle="tooltip"
              title="Pay &#128221">Fee Slip</i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h4 class="text-danger ">No data found</h4>
@endif
