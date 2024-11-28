<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include './stuInclude/header.php';
include_once('../dbConnection.php');
if (isset($_SESSION['isLogin'])) {
  $stuLogEmail = $_SESSION['stuLogEmail'];
}
else {
  echo "<script> location.href='../index.php'; </script>";
}

if (isset($_REQUEST['stuPassUpdateBtn'])) {
  if (($_REQUEST['stuNewPass'] == "")) {
    $msg = '<span class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</span>';
  } else {
    $stuNewPass = $_REQUEST['stuNewPass'];
    $sql = "UPDATE student SET stuPass = '$stuNewPass' WHERE stuEmail = '$stuLogEmail'";
    if ($conn->query($sql) == TRUE) {
      $msg = '<span class="alert alert-success col-sm-6 ml-5 mt-2">Profile Upade Successfully</span>';
    } else {
      $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update</span>';
    }
     
  }
}
?>
<div class="col-sm-6 mt-5 ml-5">
  <form action="" class="mx-5" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stuEmail">Email</label>
      <input type="text" name="stuEmail" id="stuEmail" class="form-control" value=" <?php if(isset($stuLogEmail)) { echo $stuLogEmail; } ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuNewPass">New Password</label>
      <input type="password" name="stuNewPass" id="stuNewPass" class="form-control">
    </div>
    <div class="text-center">
      <?php 
      if (isset($msg)) {
        echo $msg;
      }
      ?>
      <button type="submit" class="btn btn-danger" id="stuPassUpdateBtn" name="stuPassUpdateBtn">Update</button>
      <a href="studentProfile.php" class="btn btn-secondary">Canel</a>
    </div>
  </form>
</div>
<?php
include './stuInclude/footer.php';
?>