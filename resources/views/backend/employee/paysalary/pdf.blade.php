<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      font-size: 12px;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #customers tr:hover {
      background-color: #ddd;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>

<body>


  <table id="customers">
    <tr>
      <td>
        <h2>
          <img
            @if (file_exists($details->user->profile_photo_path)) src="/{{ $details->user->profile_photo_path }}"
                    @else
                    src="{{ asset('images/noimg.png') }}" @endif
            alt="{{ $details->user->name }}"
            width="100">
        </h2>
      </td>
      <td>
        <h2>Easy School ERP</h2>
        <p>School Address</p>
        <p>Phone : 343434343434</p>
        <p>Email : support@easylerningbd.com</p>
        <p> <b> Employee Monthly Salary </b> </p>

      </td>
    </tr>


  </table>

  @php

    $date = date('Y-m', strtotime($details->date));
    if ($date != '') {
        $where[] = ['date', 'like', $date . '%'];
    }
    $totalattend = App\Models\EmployeeAttendance::with(['user'])
        ->where($where)
        ->where('employee_id', $details->employee_id)
        ->get();
    $salary = (float) $details->user->salary;
    $salaryperday = (float) $salary / 30;
    $absentcount = count($totalattend->where('attend_status', 'absent'));
    $totalsalaryminus = (float) $absentcount * (float) $salaryperday;
    $totalsalary = (float) $salary - (float) $totalsalaryminus;

  @endphp

  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Employee Details</th>
      <th width="45%">Employee Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Employee Name</b></td>
      <td>{{ $details->user->name }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Basic Salary</b></td>
      <td>{{ $details->user->salary }}</td>
    </tr>

    <tr>
      <td>3</td>
      <td><b>Total Absent for This Month</b></td>
      <td>{{ $absentcount }}</td>
    </tr>

    <tr>
      <td>4</td>
      <td><b>Month</b></td>
      <td>{{ date('M Y', strtotime($details->date)) }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Salary This Month</b></td>
      <td>{{ $totalsalary }}</td>
    </tr>


  </table>
  <br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>
  <br> <br>
  <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Employee Details</th>
      <th width="45%">Employee Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Employee Name</b></td>
      <td>{{ $details->user->name }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Basic Salary</b></td>
      <td>{{ $details->user->salary }}</td>
    </tr>

    <tr>
      <td>3</td>
      <td><b>Total Absent for This Month</b></td>
      <td>{{ $absentcount }}</td>
    </tr>

    <tr>
      <td>4</td>
      <td><b>Month</b></td>
      <td>{{ date('M Y', strtotime($details->date)) }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Salary This Month</b></td>
      <td>{{ $totalsalary }}</td>
    </tr>


  </table>
  <br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>



</body>

</html>
