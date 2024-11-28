<!-- header file -->
<?php
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  include('./dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <title>iSchool</title>
</head>
<body>
  <!-- start navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">iSchool</a>
    <span class="navbar-text">Learn and Implement</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav custom-nav pl-5">
        <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item custom-nav-item"><a href="course.php" class="nav-link">Courses</a></li>
        <li class="nav-item custom-nav-item"><a href="paymentStatus.php" class="nav-link">Payment Status</a></li>
        <?php
          if(session_status() !== PHP_SESSION_ACTIVE) session_start();
          if (isset($_SESSION['isLogin'])) {
            echo '
            <li class="nav-item custom-nav-item"><a href="./student/studentProfile.php" class="nav-link">My Profile</a></li>
            <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            ';
          } else {
          }
        ?>
        <li class="nav-item custom-nav-item"><a href="./index.php#Feedback" class="nav-link">Feedback</a></li>
        <li class="nav-item custom-nav-item"><a href="./index.php#contact" class="nav-link">Contact</a></li>
      </ul>
    </div>
  </nav>
  <!-- end navigation -->

<!-- start course banner -->
<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./image/courseBanner.jpg" alt="courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10ppx;"/>
  </div>
</div>
<!-- end course banner -->

<!-- start main content -->
<div class="container jumbotron mt-4">
  <div class="row">
    <div class="col-md-5">
      <h5 class="mb-3">New User || Sign Up</h5>
      <form role="form" id="stuRegForm">
      <div class="form-group">
        <i class="fas fa-user"></i> <label for="stuname" class="pl-2 font-weight-bold">Name</label>
        <small id="statusMsg1"></small>
        <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
      </div>
      <div class="form-group">
        <i class="fas fa-envelope"></i> <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
        <small id="statusMsg2"></small>
        <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
      </div>
      <div class="form-group">
        <i class="fas fa-user"></i> <label for="stupass" class="pl-2 font-weight-bold">New Password</label>
        <small id="statusMsg3"></small>
        <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
      </div>
      <button type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData()">Close</button>
      </form><br>
      <small id="successMsg"></small>
    </div>
    <div class="col-md-5">
      <h5 class="mb-3">If Alread Registered || Login</h5>
      <form role="form" id = "stuLoginForm">
        <div class="form-group">
          <i class="fas fa-envelope"></i> <label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label><small><small id="statusMsg1"></small>
          <input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i> <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass">
        </div>
        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData1()">Cancel</button>
      </form> <br>
      <small id="statusLogMsg"></small>
    </div>
  </div>
</div>
<!-- end main content -->

<!-- start contact us -->
<div class="container mt-4" id="Contact">
    <!-- start contact us containar -->
    <h2 class="text-center mb-4">Contact US</h2>
    <div class="row">
      <div class="col-md-8">
        <form action="#" method="post">
          <input type="text" class="form-control" name="name" placeholder="Name"><br>
          <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
          <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
          <textarea name="message" class="form-control" placeholder="How can we help you?" style="height: 150px;"></textarea> <br>
          <input type="submit" value="Send" class="btn btn-primary" name="submit"> <br><br>
        </form>
      </div>
      <div class="col-md-4 stripe text-white text-center">
        <h4>iSchool</h4>
        <p>iSchool, Near Police Camp, Sakhipur, Tangail <br>
          Phone: +8801731-040473 <br>
          www.iSchool.com
        </p>
      </div>
    </div>
    <!-- end contact us containar -->
  </div>
  <!-- end contact us -->

  <!-- start student registration -->
  <!-- Modal -->
  <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <!-- add student registration form -->
        <?php include('./studentRegistration.php'); ?>
        </div>
        <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" onclick="addStu()">Sign Up</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData()">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end student registration -->

  <!-- start student Login -->
  <!-- Modal -->
  <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="stuLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i> <label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i> <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass">
          </div>
        </form>
        </div>
        <div class="modal-footer">
        <span id="statusLogMsg"></span>
        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData1()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end student Login -->

  <!-- start admin Login -->
  <!-- Modal -->
  <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="adminLoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i> <label for="adminLogEmail" class="pl-2 font-weight-bold">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="adminLogEmail" id="adminLogEmail">
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i> <label for="adminLogPass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="adminLogPass" id="adminLogPass">
          </div>
        </form>
        </div>
        <div class="modal-footer">
        <span id="adminStatusLogMsg"></span>
        <button type="button" class="btn btn-primary" id="adminLoginButton" onclick="checkAdminLogin()">Login</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearData2()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end admin Login -->
  
<!-- footer file -->
<?php
  include('./mainInclude/footer.php');
?>

