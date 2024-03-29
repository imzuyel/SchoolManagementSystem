  <!-- Multiple image preview -->
  <script>
    $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove</span>" +
                "</span>").insertAfter("#files");
              $(".remove").click(function() {
                $(this).parent(".pip").remove();
              });

            });
            fileReader.readAsDataURL(f);
          }
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
    });
  </script>
  <script type="text/javascript">
    // window.onload = function() {
    //   if (sessionStorage.getItem('darktheme')) {
    //     $("html").addClass("dark-theme");
    //     $('#darkmode').prop('checked', true);
    //     $('#lightmode').prop('checked', false);
    //   }
    // }
  </script>



  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });

      // Assing Student
      $(".searchStudent").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        $.ajax({
          type: "post",
          url: "/student/assing/search",
          data: {
            year_id: year_id,
            class_id: class_id,
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#assingStudent1").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");

            $("#example").DataTable({
              "responsive": true,
              "lengthChange": true,
              "autoWidth": false,
              "bDestroy": true,
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

            $('.delete-confirm').click(function(event) {
              var form = $(this).closest("form");
              event.preventDefault();
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  form.submit();
                }
              })
            });

          },
        });
      });

      //Apppend Roll
      $(".rollSearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        $.ajax({
          type: "post",
          url: "/student/roll/generate/get",
          data: {
            year_id: year_id,
            class_id: class_id,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
            // $("#example").attr("id", "newId");
            $('table').removeAttr('id');
          },
          success: function(resp) {
            $("#appendRoll").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Apppend mark
      $(".markSearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id_1").val();
        var assignsubject_id = $("#assignsubject_id").val();
        var examtype_id = $("#examtype_id").val();
        $.ajax({
          type: "post",
          url: "/mark/entry/student/get",
          data: {
            year_id: year_id,
            class_id: class_id,
            assignsubject_id: assignsubject_id,
            examtype_id: examtype_id,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#appendMark").html(resp);
          },

          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Apppend mark
      $(".markEdit").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id_1").val();
        var assignsubject_id = $("#assignsubject_id").val();
        var examtype_id = $("#examtype_id").val();
        $.ajax({
          type: "post",
          url: "/mark/entry/student/get/edit",
          data: {
            year_id: year_id,
            class_id: class_id,
            assignsubject_id: assignsubject_id,
            examtype_id: examtype_id,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#appendMark").html(resp);
          },

          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });


      //Regstration fee
      $(".feeSearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        $.ajax({
          type: "post",
          url: "/student/registration/fee",
          data: {
            year_id: year_id,
            class_id: class_id,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
            $('table').removeAttr('id');
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Monthly fee
      $(".monthlySearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        var month = $("#month").val();
        $.ajax({
          type: "post",
          url: "/student/monthly/fee",
          data: {
            year_id: year_id,
            class_id: class_id,
            month: month,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
            $('table').removeAttr('id');
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Exam Fee
      $(".examSearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        var examtype = $("#examtype").val();
        $.ajax({
          type: "post",
          url: "/student/exam/fee",
          data: {
            year_id: year_id,
            class_id: class_id,
            examtype: examtype,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
            $('table').removeAttr('id');
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Exam Fee
      $(".salaryPay").click(function() {
        var date = $("#date").val();
        $.ajax({
          type: "post",
          url: "/employee/monthly/salary/pay",
          data: {
            date: date,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });


      $('#leave_purpose_id').on('change', function() {
        var leave_purpose_id = $(this).val();
        if (leave_purpose_id == 0) {
          $('#new_purpose').show();
        } else {
          $('#new_purpose').hide();
        }
      });


      $('#class_id_1').on('change', function() {
        var class_id = $(this).val();
        $.ajax({
          type: "POST",
          url: "/mark/entry/get/class",
          data: {
            'class_id': class_id,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#classAppend").html(resp);
            $("#assignsubject_id").select2({
              theme: "bootstrap4",
              width: $(this).data("width") ?
                $(this).data("width") : $(this).hasClass("w-100") ?
                "100%" : "style",
              placeholder: $(this).data("placeholder"),
              allowClear: Boolean($(this).data("allow-clear")),
            });
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });

      //Exam Fee
      $(".studentFeeSearch").click(function() {
        var year_id = $("#year_id").val();
        var class_id = $("#class_id").val();
        var fee_category_id = $("#fee_category_id").val();
        var date = $("#date").val();
        $.ajax({
          type: "post",
          url: "/account/studentfee/get",
          data: {
            year_id: year_id,
            class_id: class_id,
            fee_category_id: fee_category_id,
            date: date,

          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
            $('table').removeAttr('id');
          },
          success: function(resp) {
            $("#appendStudentFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });


      //Exam Fee
      $(".EmployeeSalary").click(function() {
        var date = $("#date").val();
        $.ajax({
          type: "post",
          url: "/account/employee/salary/get",
          data: {
            date: date,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });


      //Exam Fee
      $(".ProfiteSearch").click(function() {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
          type: "post",
          url: "/report/profite/get",
          data: {
            start_date: start_date,
            end_date: end_date,
            "_token": "{{ csrf_token() }}",
          },
          beforeSend: function() {
            $(".pace").removeClass("pace-inactive");
          },
          success: function(resp) {
            $("#appendFee").html(resp);
          },
          complete: function() {
            $(".pace").addClass("pace-inactive");
          },
        });
      });


    });
  </script>
