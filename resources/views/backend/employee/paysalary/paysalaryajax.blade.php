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
                    <td>{{ $totalsalary }}</td>
                    <td>
                      <a class="btn btn-sm btn-success"
                        target="_blank"
                        href="{{ route('employee.monthly.salary.payslip', $employee->employee_id) }}"
                        data-toggle="tooltip"
                        title="Pay &#128221">Fee Slip
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <h4 class="text-danger ">No data found</h4>
          @endif

        </div>
      </div>
    @endif
