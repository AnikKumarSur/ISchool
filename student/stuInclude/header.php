<?php
if(!isset($_SESSION)) {
  session_start();
}
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
  $stuImg = $row['stuImg'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
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
    <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">
      iSchool <small class="text-white">Profile</small>
    </a>
  </nav>
  <!-- end top navbar -->

  <!-- start side bar -->
  <div class="container-fluid mb-5" style="margin-top: 40px;">
    <div class="row">
      <nav class="col-sm-3 col-md-2 bg-dark sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item mb-3">
              <img src="<?php echo $stuImg; ?>" alt="studentImage" class ="rounded-circle" width="200" height="200">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php">
              <i class="fa-solid fa-house"></i>
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentProfile.php">
              <i class="fas fa-user"></i>
                Profile <span class="sr-only">(Current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./myCourse.php">
              <i class="fab fa-accessible-icon"></i>
                My Course
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">
              <i class="fa-brands fa-accessible-icon"></i>
                Feedback
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="changeStuPass.php">
              <i class="fas fa-key"></i>
                Change Password
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">
              <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    
  

