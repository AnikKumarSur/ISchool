<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include('./dbConnection.php');
if (!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='loginOrSignup.php'; </script>";
} else {
  $stuLogEmail = $_SESSION['stuLogEmail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- fontawesome css -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css">

  <!-- slider file start -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/slider.css">
  <!-- slider file end -->
  <title>checkout</title>
</head>
<body>
  <!-- start main contest -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotron">
          <h3 class="mb-5">Welcome to iSchool Payment Page</h3>
          <form method="POST" action="./sslPayment.php">
            <div class="form-group row">
              <label for="orderId" class="col-sm-4 col-form-label">Oder ID</label>
              <div class="col-sm-8">
                <input id="orderId" class="form-control" tabindex="1" maxlength="20" size="20" name="orderId" autocomplete="off" value="<?php echo "ORDS" . rand(10000, 99999999) ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="stuEmail" class="col-sm-4 col-form-label">Student Email</label>
              <div class="col-sm-8">
                <input id="stuEmail" class="form-control" tabindex="2" maxlength="12" size="12" name="stuEmail" autocomplete="off" value="<?php if (isset($stuLogEmail)) { echo $stuLogEmail; } ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="amount" class="col-sm-4 col-form-label">Amount</label>
              <div class="col-sm-8">
                <input type="text" id="amount" class="form-control" tabindex="10" maxlength="12" size="12" name="amount" autocomplete="off" value="<?php if (isset($_GET['id'])) { echo $_GET['id']; } ?>" readonly>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" value="checkout" class="btn btn-primary" onclick="">
              <a href="./course.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- end main contest -->

<!-- jquery and bootstrap js -->
<script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- fontawesome js -->
  <script src="js/all.min.js"></script>
  <!-- student ajax request -->
  <script type="text/javascript" src="js/ajaxRequest.js"></script>
  <!-- admin ajax request -->
  <script type="text/javascript" src="js/AdminAjaxRequest.js"></script>
</body>
</html>
<?php
}
?>