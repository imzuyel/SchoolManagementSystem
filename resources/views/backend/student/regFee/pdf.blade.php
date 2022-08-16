<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>{{ config('app.name') }} | Invoice</title>
  <link rel="shortcut icon"
    type="image/png"
    href="./favicon.png" />
  <link rel="icon"
    href="{{ asset('/assets/images/logo-icon.png') }}"
    type="image/png" />

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
            @if (file_exists($student->profile_photo_path)) src="/{{ $student->profile_photo_path }}"
                    @else
                    src="{{ asset('images/noimg.png') }}" @endif
            alt="{{ $student->name }}"
            width="100">
        </h2>
      </td>
      <td>
        <h2>{{ config('app.name') }} | Invoice</h2>
        <p>School Address</p>
        <p>Phone : 01312733791</p>
        <p>Email : support@imzuyel.com</p>
        <p> <b> Student Registration Fee</b> </p>
      </td>
    </tr>
  </table>
  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Student ID No</b></td>
      <td>{{ $student->student->id_no }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Roll No</b></td>
      <td>{{ $student->roll }}</td>
    </tr>
    <tr>
      <td>3</td>
      <td><b>Student Name</b></td>
      <td>{{ $student->student->name }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td><b>Father's Name</b></td>
      <td>{{ $student->student->father_name }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Session</b></td>
      <td>{{ $student->year->name }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Class </b></td>
      <td>{{ $student->class->name }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Registration Fee</b></td>
      <td>{{ $feecategoryamount->amount }} $</td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Discount Fee </b></td>
      <td>{{ $student->discount->discount }} %</td>
    </tr>
    <tr>
      <td>9</td>
      <td><b>Fee For this Student </b></td>
      <td>{{ $feecategoryamount->amount - ($student->discount->discount / 100) * $feecategoryamount->amount }} $
      </td>
    </tr>
  </table>
  <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>
  <br> <br>
  <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 30px">
  <table id="customers">
    <tr>
      <th width="10%">Sl</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    <tr>
      <td>1</td>
      <td><b>Student ID No</b></td>
      <td>{{ $student->student->id_no }}</td>
    </tr>
    <tr>
      <td>2</td>
      <td><b>Roll No</b></td>
      <td>{{ $student->roll }}</td>
    </tr>
    <tr>
      <td>3</td>
      <td><b>Student Name</b></td>
      <td>{{ $student->student->name }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td><b>Father's Name</b></td>
      <td>{{ $student->student->father_name }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Session</b></td>
      <td>{{ $student->year->name }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Class </b></td>
      <td>{{ $student->class->name }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Registration Fee</b></td>
      <td>{{ $feecategoryamount->amount }} $</td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Discount Fee </b></td>
      <td>{{ $student->discount->discount }} %</td>
    </tr>
    <tr>
      <td>9</td>
      <td><b>Fee For this Student </b></td>
      <td>{{ $feecategoryamount->amount - ($student->discount->discount / 100) * $feecategoryamount->amount }} $
      </td>
    </tr>
  </table>
  <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>
</body>

</html>
