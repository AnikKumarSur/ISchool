<?php
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  include('../dbConnection.php');
  if (isset($_SESSION['isAdminLogin'])) {
    $admimEmail = $_SESSION['adminLogEmail'];
  } else {
    echo "<script> location.href='../index.php'; </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sell Report</title>
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
              <a class="nav-link" href="lessons.php">
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
      <div class="col-sm-9 mt-5">
        <form action="#" method="POST" class="d-print-none">
          <div class="form-row">
            <div class="form-group col-md-2">
              <input type="date" class="form-control" id="startDate" name="startDate">
            </div>
            <span> to </span>
            <div class="form-group col-md-2">
              <input type="date" class="form-control" id="endDate" name="endDate">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-secondary" name="searchSubmit" value="Search">
            </div>
          </div>
        </form>
        <?php
        if (isset($_REQUEST['searchSubmit'])) {
          $startDate = $_REQUEST['startDate'];
          $endDate = $_REQUEST['endDate'];
          $sql = "SELECT * FROM courseorder WHERE orderDate BETWEEN '$startDate' AND '$endDate'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            echo '<h3 class="bg-dark text-white p-2 mt-4 text-center"> Sell Report </h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Course ID</th>
                  <th scope="col">Student Email</th>
                  <th scope="col">Payment Status</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Bank</th>
                </tr>
              </thead>
              <tbody>';
                while ($row = $result->fetch_assoc()) {
                  echo '<tr>
                    <th scope="row">'.$row['orderId'].'</th>
                    <th scope="row">'.$row['courseID'].'</th>
                    <th scope="row">'.$row['stuEmail'].'</th>
                    <th scope="row">'.$row['status'].'</th>
                    <th scope="row">'.$row['orderDate'].'</th>
                    <th scope="row">'.$row['amount'].'</th>
                    <th scope="row">'.$row['cardType'].'</th>
                  </tr>';
                }
                echo '<tr>
                  <td>
                    <form class="d-print-none">
                      <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
                    </form>
                  </td>
                </tr>';
              echo '</tbody>
            </table>';
          } else {
            echo '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">
            No Records Found !
            </div>';
          }
        }
        ?>
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
