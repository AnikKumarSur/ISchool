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

$sql = "SELECT * FROM student WHERE stuEmail = '$stuLogEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $stuId = $row['stuId'];
}

if (isset($_REQUEST['submitFeedbackBtn'])) {
  if (($_REQUEST['fContent'] == "")) {
    $msg = '<span class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</span>';
  } else {
    $fContent = $_REQUEST['fContent'];
    $sql = "INSERT INTO feedback (fContent, stuId) VALUES('$fContent', '$stuId')";
    if ($conn->query($sql) == TRUE) {
      $msg = '<span class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</span>';
    } else {
      $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update</span>';
    }
     
  }
}
?>
<div class="col-sm-6 mt-5 ml-5">
  <form action="" class="mx-5" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stuId">Student ID</label>
      <input type="text" name="stuId" id="stuId" class="form-control" value=" <?php if(isset($stuId)) { echo $stuId; } ?>" readonly>
    </div>
    <div class="form-group">
      <label for="fContent">Feedback</label>
      <textarea name="fContent" id="fContent" rows="2" class="form-control"></textarea>
    </div>
    <div class="text-center">
      <?php 
      if (isset($msg)) {
        echo $msg;
      }
      ?>
      <button type="submit" class="btn btn-primary" id="submitFeedbackBtn" name="submitFeedbackBtn">Submit</button>
      <a href="studentProfile.php" class="btn btn-secondary">Canel</a>
    </div>
  </form>
</div>
<?php
include './stuInclude/footer.php';
?>