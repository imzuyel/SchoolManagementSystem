@if (count($students) > 0)

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
        <th>Student</th>
        <th>Roll</th>
        <th>Monthly</th>
        <th>Discount</th>
        <th>Student Fee</th>
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
          <td>{{ $student->roll }}</td>
          <td>{{ $feecategoryamount->amount }}</td>
          <td>{{ $student->discount->discount }} %</td>
          <td>{{ $feecategoryamount->amount - ($student->discount->discount / 100) * $feecategoryamount->amount }}
          </td>
          <td>
            @if (isset($month))
              <a class="btn btn-sm btn-success"
                target="_blank"
                href="{{ route('student.monthlyfeepdf', [$student->student_id, $class_id, $month]) }}"
                data-toggle="tooltip"
                title="Pay &#128221">Fee Slip</i>
              </a>
            @else
              <a class="btn btn-sm btn-success"
                target="_blank"
                href="{{ route('student.monthlyfeepdf', [$student->student_id, $class_id, 'January']) }}"
                data-toggle="tooltip"
                title="Pay &#128221">Fee Slip</i>
              </a>
            @endif

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h4 class="text-danger ">No data found</h4>
@endif
