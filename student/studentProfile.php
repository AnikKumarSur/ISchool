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
  $stuName = $row['stuName'];
  $stuOcc = $row['stuOcc'];
  $stuImg = $row['stuImg'];
}

if (isset($_REQUEST['updateStuNameBtn'])) {
  if (($_REQUEST['stuName'] == "")) {
    $msg = '<span class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</span>';
  } else {
    $stuName = $_REQUEST['stuName'];
    $stuOcc = $_REQUEST['stuOcc'];
    $stuImg = $_FILES['stuImg']['name'];
    $stuImgTemp = $_FILES['stuImg']['tmp_name'];
    $imgFolder = '../image/stuImage/'.$stuImg;
    move_uploaded_file($stuImgTemp, $imgFolder);
    $sql = "UPDATE student SET stuName = '$stuName', stuOcc = '$stuOcc', stuImg = '$imgFolder' WHERE stuEmail = '$stuLogEmail'";
    if ($conn->query($sql) == TRUE) {
      $msg = '<span class="alert alert-success col-sm-6 ml-5 mt-2">Profile Updated Successfully</span>';
    } else {
      $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update</span>';
    }
     
  }
}
?>
<div class="col-sm-6 mt-5 mx-3">
  <form action="" class="mx-5" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stuId">Student ID</label>
      <input type="text" name="stuId" id="stuId" class="form-control" value=" <?php if(isset($stuId)) { echo $stuId; } ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuEmail">Email</label>
      <input type="email" name="stuEmail" id="stuEmail" class="form-control" value=" <?php if(isset($row['stuEmail'])) { echo $row['stuEmail']; } ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuName">Name</label>
      <input type="text" name="stuName" id="stuName" class="form-control" value=" <?php if(isset($row['stuName'])) { echo $row['stuName']; } ?>">
    </div>
    <div class="form-group">
      <label for="stuOcc">Occupation</label>
      <input type="text" name="stuOcc" id="stuOcc" class="form-control" value=" <?php if(isset($row['stuOcc'])) { echo $row['stuOcc']; } ?>">
    </div>
    <div class="form-group">
      <label for="stuImg">Course Image</label>
      <input type="file" name="stuImg" id="stuImg" class="form-control">
    </div>
    <div class="text-center">
      <?php 
      if (isset($msg)) {
        echo $msg;
      }
      ?>
      <button type="submit" class="btn btn-danger" id="updateStuNameBtn" name="updateStuNameBtn">Update</button>
      <a href="studentProfile.php" class="btn btn-secondary">Canel</a>
    </div>
  </form>
</div>
<?php
include './stuInclude/footer.php';
?>