<?php
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  include('../dbConnection.php');
  if (isset($_SESSION['isAdminLogin'])) {
    $admimEmail = $_SESSION['adminLogEmail'];
  } else {
    echo "<script> location.href='../index.php'; </script>";
  }
  if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['courseID'] == "") || ($_REQUEST['courseName'] == "") || ($_REQUEST['courseDesc'] == "") || ($_REQUEST['courseAuthor'] == "") || ($_REQUEST['courseDuration'] == "") || ($_REQUEST['coursePrice'] == "") || ($_REQUEST['courseOriginalPrice'] == "")) {
      $msg = '<span class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</span>';
    } else {
      $courseID = $_REQUEST['courseID'];
      $courseName = $_REQUEST['courseName'];
      $courseDesc = $_REQUEST['courseDesc'];
      $courseAuthor = $_REQUEST['courseAuthor'];
      $courseDuration = $_REQUEST['courseDuration'];
      $coursePrice = $_REQUEST['coursePrice'];
      $courseOriginalPrice = $_REQUEST['courseOriginalPrice'];
      $courseImg = $_FILES['courseImg']['name'];
      $courseImgTemp = $_FILES['courseImg']['tmp_name'];
      $imgFolder = '../image/courseImage/'.$courseImg;
      move_uploaded_file($courseImgTemp, $imgFolder);
      $sql = "UPDATE course SET courseID = '$courseID', courseName = '$courseName', courseDesc = '$courseDesc', courseAuthor = '$courseAuthor', courseDuration = '$courseDuration', coursePrice = '$coursePrice', courseOriginalPrice = '$courseOriginalPrice', courseImg = '$imgFolder' WHERE courseID = '$courseID'";
      if ($conn->query($sql) == TRUE) {
        $msg = '<span class="alert alert-success col-sm-6 ml-5 mt-2">Course updated Successfully</span>';
      } else {
        $msg = '<span class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to updated Course</span>';
      }
       
    }
  }
?>
<?php
  if(isset($_REQUEST['view'])) {
    $sql = "SELECT * FROM course WHERE courseID = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Course Details</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- fontawesome css -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="../css/adminStyle.css">
</head>
<body>
  <!-- start top navbar -->
  <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #16a085">
    <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">
      iSchool <small class="text-white">Admin Area</small>
    </a>
  </nav>
  <!-- end top navbar -->

  <!-- start side bar -->
  <div class="container-fluid mb-5" style="margin-top: 40px;">
    <div class="row">
      <nav class="col-sm-3 col-md-2 bg-dark sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="adminDashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courses.php">
              <i class="fa-brands fa-accessible-icon"></i>
                Courses
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
              <i class="fa-brands fa-accessible-icon"></i>
                Lessons
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students.php">
              <i class="fas fa-user"></i>
                Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sellReport.php">
              <i class="fas fa-table"></i>
                Sell Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="paymentStatus.php">
              <i class="fas fa-table"></i>
                Payment Status
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">
              <i class="fa-brands fa-accessible-icon"></i>
                Feedback
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="changeAdminPass.php">
              <i class="fas fa-key"></i>
                Change Password
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Update Course Details</h3>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="courseID">Course ID</label>
            <input type="text" name="courseID" id="courseID" class="form-control" value=" <?php if(isset($row['courseID'])) { echo $row['courseID']; } ?>" readonly>
          </div>
          <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" name="courseName" id="courseName" class="form-control" value=" <?php if(isset($row['courseName'])) { echo $row['courseName']; } ?>">
          </div>
          <div class="form-group">
            <label for="courseDesc">Course Description</label>
            <textarea name="courseDesc" id="courseDesc" rows="2" class="form-control"><?php if(isset($row['courseDesc'])) { echo $row['courseDesc']; } ?></textarea>
          </div>
          <div class="form-group">
            <label for="courseAuthor">Course Author</label>
            <input type="text" name="courseAuthor" id="courseAuthor" class="form-control" value=" <?php if(isset($row['courseAuthor'])) { echo $row['courseAuthor']; } ?>">
          </div>
          <div class="form-group">
            <label for="courseDuration">Course Duration</label>
            <input type="text" name="courseDuration" id="courseDuration" class="form-control" value=" <?php if(isset($row['courseDuration'])) { echo $row['courseDuration']; } ?>">
          </div>
          <div class="form-group">
            <label for="courseOriginalPrice">Course Original Price</label>
            <input type="text" name="courseOriginalPrice" id="courseOriginalPrice" class="form-control" value=" <?php if(isset($row['courseOriginalPrice'])) { echo $row['courseOriginalPrice']; } ?>">
          </div>
          <div class="form-group">
            <label for="coursePrice">Course Selling Price</label>
            <input type="text" name="coursePrice" id="coursePrice" class="form-control" value=" <?php if(isset($row['coursePrice'])) { echo $row['coursePrice']; } ?>">
          </div>
          <div class="form-group">
            <img src="<?php if(isset($row['courseImg'])) { echo $row['courseImg']; } ?>" alt="" class="img-thumbnail">
            <label for="courseImg">Course Image</label>
            <input type="file" name="courseImg" id="courseImg" class="form-control">
          </div>
          <div class="text-center">
            <?php 
            if (isset($msg)) {
              echo $msg;
            }
            ?>
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Canel</a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- end side bar -->

  <!-- jquery and bootstrap js -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- fontawesome js -->
  <script src="../js/all.min.js"></script>
  <!-- admin ajax request -->
  <script type="text/javascript" src="../js/AdminAjaxRequest.js"></script>
</body>
</body>
</html>