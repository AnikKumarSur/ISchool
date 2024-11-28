<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include_once('../dbConnection.php');
if (isset($_SESSION['isLogin'])) {
  $stuLogEmail = $_SESSION['stuLogEmail'];
}
else {
  echo "<script> location.href='../index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <title>Document</title>
</head>
<body>
<!-- start main content -->
<div class="container-fluid p-2" style="background-color: #16a085">
  <h3>Welcome to iSchool</h3>
  <a class="btn btn-danger" href="./myCourse.php">My Course</a>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 border-right">
      <h4 class="text-center">Lessons</h4>
      <ul id="playlist" class="nav flex-column">
        <?php  
          if (isset($_GET['courseID'])) {
            $courseID = $_GET['courseID'];
            $sql = "SELECT * FROM lesson WHERE courseID = '$courseID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lessonLink'].' style="cursor:pointer;">'.$row['lessonName'].'</li>';
              }
            }
          }
        ?>
      </ul>
    </div>
    <div class="col-sm-8">
      <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
    </div>
  </div>
</div>
<!-- end main content -->
  <!-- jquery and bootstrap js -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- fontawesome js -->
  <script src="../js/all.min.js"></script>
  <!-- custom js for video play -->
  <script src="../js/custom.js"></script>
</body>
</html>