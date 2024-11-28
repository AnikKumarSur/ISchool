function addStu() {
  var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var stuName = $("#stuname").val();
  var stuEmail = $("#stuemail").val();
  var stuPass = $("#stupass").val();

  // checking form field
  if (stuName.trim() == "") {
    $("#statusMsg1").html('<small style="color: red;"> Please Enter Name! </small>');
    $("#stuName").focus();
    return false;
  } else if (stuEmail.trim() == "") {
    $("#statusMsg2").html('<small style="color: red;"> Please Enter Email! </small>');
    $("#stuEmail").focus();
    return false;
  } else if (stuEmail.trim() != "" && !reg.test(stuEmail)) {
    $("#statusMsg2").html('<small style="color: red;"> Please Enter Valid Email! </small>');
    $("#stuEmail").focus();
    return false;
  } else if (stuPass.trim() == "") {
    $("#statusMsg3").html('<small style="color: red;"> Please Enter Password! </small>');
    $("#stuPass").focus();
    return false;
  } else {
    $.ajax({
      url: 'student/addStudent.php',
      method: 'POST',
      dataType: "json",
      data: {
        stuName: stuName,
        stuEmail: stuEmail,
        stuPass: stuPass,
      },
      success: function (data) {
        if (data == "invalidEmail") {
          $('#successMsg').html("<span class='alert alert-danger'> Invalid Email. Try With another Email. </span>");
          clearStuRegField();
        } else 
        if (data == "ok") {
          $('#successMsg').html("<span class='alert alert-success'> Registration Successful! </span>");
          clearStuRegField();
        } else if (data == "failed") {
          $('#successMsg').html("<span class='alert alert-danger'> Unable to Register </span>");
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
        }
      },
    });
  }
}

// Regi close button
function clearData() {
  clearStuRegField();
}

// clear student regi field
function clearStuRegField() {
  $("#stuRegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
}

// ajax call for student login verification
function checkStuLogin() {
  var stuLogEmail = $("#stuLogEmail").val();
  var stuLogPass = $("#stuLogPass").val();
  $.ajax({
    url: 'student/addStudent.php',
    method: 'POST',
    data: {
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      if (data == 0) {
        $('#statusLogMsg').html('<span class="alert alert-danger"> Invalid Email or Password. </span>');
        clearStuLoginField();
      } else {
        $('#statusLogMsg').html('<div class="spinner-border text-success" role="status"></div>');
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    },
  });
}

// clear student log field
function clearStuLoginField() {
  $("#stuLoginForm").trigger("reset");
}

// Regi cancel button
function clearData1() {
  clearStuLoginField();
  $('#statusLogMsg').html(" ");
}