    @if (isset($employees))
      <div class="mb-4 card-header border-bottom-0">
        <div class="d-flex align-items-center">
          <div>
            @if (isset($yearname))
              <h5> <code>{{ $yearname->name }}</code> class <code>{{ $classname->name }}</code> employees</h5>
            @else
              <h5>All Attendance employee</h5>
            @endif

          </div>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">

          @if (count($employees) > 0)
            <form action="{{ route('account.employeesalary.store') }}"
              method="post">
              @csrf
              <table id="example"
                class="table text-center table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Basic Salary</th>
                    <th>Absent</th>
                    <th>Total Salary</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employees as $key => $employee)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>
                        <div class="mt-3 media align-items-center ">
                          <img
                            @if (file_exists($employee->user->profile_photo_path)) src="/{{ $employee->user->profile_photo_path }}"
                         @else
                         src="{{ asset('images/noimg.png') }}" @endif
                            class="rounded-circle"
                            alt=""
                            width="45"
                            height="45">
                          <div class="media-body"
                            style="flex: 0.5;">
                            <p class="mb-0 ml-2 font-weight-bold">{{ $employee->user->name }}</p>
                          </div>
                        </div>
                      </td>
                      <td>{{ $employee->user->salary }}</td>

                      <td>

                        @php
                          $absent = count(
                              $employee
                                  ->where('attend_status', 'absent')
                                  ->where('employee_id', $employee->user->id)
                                  ->where($where)
                                  ->get(),
                          );
                          $salaryperday = $employee->user->salary / 30;
                          $totalsalaryminus = $absent * $salaryperday;
                          $totalsalary = $employee->user->salary - $totalsalaryminus;
                        @endphp
                        <span class="badge badge-danger">
                          {{ $absent }}</span>
                      </td>
                      <td>{{ round($totalsalary) }}</td>
                      <td>

                        <input type="hidden"
                          name="employee_id[]"
                          value="{{ $employee->user->id }}">

                        <input type="hidden"
                          name="amount[]"
                          value="{{ round($totalsalary) }}">
                        <input type="hidden"
                          name="date"
                          value="{{ $date }}">

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
                              name="pay_status{{ $key }}"
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
      </div>
    @endif
