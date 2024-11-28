// ajax call for admin login verification
function checkAdminLogin() {
  var adminLogEmail = $("#adminLogEmail").val();
  var adminLogPass = $("#adminLogPass").val();
  $.ajax({
    url: 'admin/admin.php',
    method: 'POST',
    data: {
      adminLogEmail: adminLogEmail,
      adminLogPass: adminLogPass,
    },
    success: function (data) {
      if (data == 0) {
        $('#adminStatusLogMsg').html('<span class="alert alert-danger"> Invalid Email or Password. </span>');
        clearAdminLoginField();
      } else {
        $('#adminStatusLogMsg').html('<span class="alert alert-success"> Successfully Login </span>');
        setTimeout(() => {
          window.location.href = "admin/adminDashBoard.php";
        }, 1000);
      }
    },
  });
}

// clear admin log field
function clearAdminLoginField() {
  $("#adminLoginForm").trigger("reset");
}

// login cancel button
function clearData2() {
  console.log("done");
  clearAdminLoginField();
  $('#adminStatusLogMsg').html("");
}