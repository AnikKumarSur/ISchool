<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include_once('../dbConnection.php');

if (isset($_POST['stuName']) && isset($_POST['stuEmail']) && isset($_POST['stuPass'])) {
  $stuName = $_POST['stuName'];
  $stuEmail = $_POST['stuEmail'];
  $stuPass = $_POST['stuPass'];

  $sql = "SELECT stuEmail FROM student WHERE stuEmail = '".$stuEmail."'";
  $result = $conn->query($sql);
  if (($result->num_rows) > 0) {
    echo json_encode("invalidEmail");
  } else {
    $sql = "INSERT INTO student(stuName, stuEmail, stuPass) VALUES('$stuName', '$stuEmail', '$stuPass')";
    if($conn->query($sql) == TRUE) {
    echo json_encode("ok");
    } else {
    echo json_encode("failed");
    }
  }
}

// student login verification
if(!isset($_SESSION['isLogin'])) {
  if (isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])) {
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];
    $sql = "SELECT stuEmail, stuPass FROM student WHERE stuEmail = '".$stuLogEmail."' AND stuPass = '".$stuLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if ($row == 1) {
      $_SESSION['isLogin'] = true;
      $_SESSION['stuLogEmail'] = $stuLogEmail;
      echo json_encode($row);
    } else if ($row == 0) {
      echo json_encode($row);
    }
  }
}
?>