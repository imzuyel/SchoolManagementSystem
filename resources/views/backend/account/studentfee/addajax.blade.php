@if (isset($students))


  <div class="p-5 card radius-15">
    @if (count($students) > 0)
      <form action="{{ route('account.studentfee.store') }}"
        method="post">
        @csrf
        <table id="example"
          class="table text-center table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Student</th>
              <th>Fee Amount</th>
              <th>Discount</th>
              <th>Student Fee</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $key => $student)
              <tr>

                <td>{{ $key + 1 }}</td>
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
                <td> {{ $registrationfee->amount }}</td>
                @php
                  $orginalfee = $registrationfee->amount;
                  $discount = $student->discount->discount;
                  $discountablefee = ($discount / 100) * $orginalfee;
                  $finalfee = (int) $orginalfee - (int) $discountablefee;

                  $accountstudentfees = App\Models\Studentfee::where('student_id', $student->student_id)
                      ->where('year_id', $student->year_id)
                      ->where('class_id', $student->class_id)
                      ->where('fee_category_id', $fee_category_id)
                      ->where('date', $date)
                      ->first();

                @endphp
                <td>
                  {{ $discount }} %
                </td>
                <td>{{ $finalfee }}</td>
                <td>
                  <input type="hidden"
                    name="year_id"
                    value="{{ $year_id }}">
                  <input type="hidden"
                    name="class_id"
                    value="{{ $class_id }}">
                  <input type="hidden"
                    name="date"
                    value="{{ $date }}">
                  <input type="hidden"
                    name="fee_category_id"
                    value="{{ $fee_category_id }}">
                  <input type="hidden"
                    name="student_id[]"
                    value="{{ $student->student_id }}">

                  <input type="hidden"
                    name="amount[]"
                    value="{{ $finalfee }}">
                  <div class="container">
                    <div class="button-wrap">
                      <input class="hidden radio-label pay"
                        type="radio"
                        value="pay"
                        name="pay_status{{ $key }}"
                        id="pay{{ $key }}"
                        checked="checked" />
                      <label class="button-label"
                        for="pay{{ $key }}">
                        <h1>pay</h1>
                      </label>

                      <input class="hidden radio-label unpay"
                        type="radio"
                        value="unpay"
                        id="unpay{{ $key }}" /><label class="button-label"
                        for="unpay{{ $key }}">
                        <h1>unpay</h1>
                      </label>
                    </div>
                  </div>


                </td>
              </tr>
            @endforeach
          </tbody>


        </table>
        <div class="float-right">
          <button type="submit"
            class="px-4 btn btn-primary"
            data-toggle="tooltip"
            title="Save to database &#128190;"> <i class="bx bx-save"></i> Save
          </button>
        </div>
      </form>
    @else
      <h4 class="text-danger ">No data found</h4>
    @endif
  </div>

@endif
@push('js')
  @include('backend.partials.select2')
@endpush
