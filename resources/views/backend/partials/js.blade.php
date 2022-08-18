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


      $('#leave_purpose_id').on('change', function() {
        var leave_purpose_id = $(this).val();
        if (leave_purpose_id == 0) {
          $('#new_purpose').show();
        } else {
          $('#new_purpose').hide();
        }
      });

    });
  </script>
