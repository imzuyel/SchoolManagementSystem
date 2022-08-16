<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible"
    content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
  <!--favicon-->
  <link rel="icon"
    href="{{ asset('assets/images/logo-icon.png') }}"
    type="image/png" />
  <title>{{ config('app.name') }} |Student information</title>


</head>

<body>
  <div id="content2"
    style="background: #fff;border-bottom: 1px solid #ffffff;">
    <div class="tokenDet"
      style="padding: 15px;border: 1px solid #000;width: 80%;margin: 0 auto;position: relative;overflow: hidden;">
      <div class="title"
        style="text-align: center;border-bottom: 1px solid #000;margin-bottom: 15px;">
        <h2>{{ config('app.name') }} | Student information</h2>
      </div>

      <div class="parentdiv"
        style="display: inline-block;width: 100%;position: relative;">
        <div class="innerdiv"
          style="width: 80%;float: left;">
          <div class="restDet">
            <div class="div">
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Name</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->name }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>D.O.B.</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->date_of_birth }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Address</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->address }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Contact Number</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->mobile }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Email </strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->email }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Gender </strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->gender }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Religion </strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->religion }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Father Name</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->father_name }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Mother Name</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->student->mother_name }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Year</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->year->name }}</span>

              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Class</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->class->name }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Shift</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->shift->name }}</span>
              </div>
              <div class="label"
                style="width: 30%;float: left;">
                <strong>Group</strong>
              </div>
              <div class="data"
                style="width: 70%;display: inline-block;">
                <span>{{ $assingstudent->group->name }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="sideDiv"
          style="width: 20%;float: left;">
          <div class="atts"
            style="float: left;width: 100%;">
            <div class="photo"
              style="width: 115px;height: 150px;float: right;">

              @if (isset($assingstudent->student->profile_photo_path))
                <img src="{{ asset($assingstudent->student->profile_photo_path) }}"
                  style="width: 100%;" />
              @else
                <img src="{{ asset('images/noimg.png') }}"
                  style="width: 100%;" />
              @endif

            </div>
            <div class="sign"
              style="position: absolute;bottom: 15px;right: 0;border-top: 1px dashed #000;left: 80%;text-align: right;">
              <small>Self Attested</small>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="sign">
      <button class="btn "
        style="float: left;"
        id="cmd2">pdf</button>
    </div>
  </div>



  <script>
    $('#cmd2').click(function() {
      var options = {
        //'width': 800,
      };
      var pdf = new jsPDF('p', 'pt', 'a4');
      pdf.addHTML($("#content2"), -1, 220, options, function() {

        pdf.save("{{ $assingstudent->student->name . '.pdf' }}");
      });
    });
  </script>
</body>

</html>
