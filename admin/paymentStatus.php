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
  <title>Payment Status</title>
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
      <h3 class="text-center mt-5 mb-4">Payment Status</h3>
        <form method="POST" action="">
          <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID:</label>
            <div>
              <input type="text" id="orderId" name="orderId" class="form-control mx-3">
            </div>
            <div>
              <input type="submit" name="searchPayment" value="View" class="btn btn-primary mx-4">
            </div>
          </div>
        </form>
        <?php
        if (isset($_REQUEST['searchPayment'])) {
          $orderId = $_REQUEST['orderId'];
          $sql = "SELECT * FROM courseorder WHERE orderId = '$orderId'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="row">
              <div class="col-sm-7 offset-sm-2 jumbotron">
                <h3 class="mb-3 text-center">Payment Reicept</h3>
                <form method="POST" action="./sslPayment.php">
                  <div class="form-group row">
                    <label for="orderId" class="col-sm-3 col-form-label">Oder ID</label>
                    <div class="col-sm-8">
                      <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="'.$row['orderId'].'" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="orderId" class="col-sm-3 col-form-label">Tnx ID</label>
                    <div class="col-sm-8">
                      <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="'.$row['tnxId'].'" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="orderId" class="col-sm-3 col-form-label">Payment Status</label>
                    <div class="col-sm-8">
                      <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="'.$row['status'].'" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-8">
                      <input type="text" id="amount" class="form-control" tabindex="10" maxlength="12" size="12" name="amount" autocomplete="off" value="800" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="orderId" class="col-sm-3 col-form-label">Bank</label>
                    <div class="col-sm-8">
                      <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="'.$row['cardType'].'" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="orderId" class="col-sm-3 col-form-label">Order Date</label>
                    <div class="col-sm-8">
                      <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="'.$row['orderDate'].'" readonly>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="stuEmail" class="col-sm-3 col-form-label">Student Email</label>
                    <div class="col-sm-8">
                      <input id="stuEmail" class="form-control" tabindex="2" maxlength="12" size="12" name="stuEmail" autocomplete="off" value="'.$row['stuEmail'].'" readonly>
                    </div>
                  </div>
                  <div class="text-center">
                  <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
                    <a href="./adminDashboard.php" class="btn btn-secondary">Close</a>
                  </div>
                </form>
              </div>
            </div>';
          } else {
            echo '<div class="alert alert-warning ml-5 mt-2 d-flex justify-content-center" role="alert">
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
