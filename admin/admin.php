<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include_once('../dbConnection.php');

// admin login verification
if(!isset($_SESSION['isAdminLogin'])) {
  if (isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])) {
    $adminLogEmail = $_POST['adminLogEmail'];
    $adminLogPass = $_POST['adminLogPass'];
    $sql = "SELECT adminEmail, adminPass FROM admin WHERE adminEmail = '".$adminLogEmail."' AND adminPass = '".$adminLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if ($row == 1) {
      $_SESSION['isAdminLogin'] = true;
      $_SESSION['adminLogEmail'] = $adminLogEmail;
      echo json_encode($row);
    } else if ($row == 0) {
      echo json_encode($row);
    }
  }
}
?>