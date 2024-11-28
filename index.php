<?php
  if(session_status() !== PHP_SESSION_ACTIVE) session_start();
  include('./mainInclude/header.php');
  include('./dbConnection.php');
?>

  <!-- start video -->
  <div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
      <video playsinline autoplay muted loop>
        <source src="video/backvid.mp4">
      </video>
      <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
      <h1 class="my-content">Welcome to iSchool</h1>
      <small class="my-content">Learn and Implement</small> <br>
      <?php
      if(!isset($_SESSION['isLogin'])) {
        echo '
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>
        ';
      } else {
        echo '
        <a href="./student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a></li>
        ';
      }
      ?>
    </div>
  </div>
  <!-- end video -->

  <!-- start text banner -->
  <div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
      <div class="col-sm">
        <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-bangladeshi-taka-sign mr-3"></i>Money Back Guarantee</h5>
      </div>
    </div>
  </div>
  <!-- end text banner -->

  <!-- start most popular course -->
  <div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <div class="row row-cols-1 row-cols-md-3">
      <!-- start card -->
      <?php
      $sql = "SELECT * FROM course LIMIT 6";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $courseID = $row['courseID'];
          echo '
          <div class="col mb-4">
          <a href="#" class="btn" style="text-align: left; padding: 0px;">
            <div class="card">
              <img src="'.str_replace('..', '.', $row['courseImg']).'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">'.$row['courseName'].'</h5>
                <p class="card-text">'.$row['courseDesc'].'</p>
              </div>
              <div class="card-footer">
                <p class="card-text d-inline">
                  Pirce: <small><del>&#2547; '.$row['courseOriginalPrice'].'</del> </small>
                  <span class="font-weight-border">&#2547; '.$row['coursePrice'].'</span>
                </p>
                <a class="btn btn-primary text-white font-weight-border float-right" href="courseDetails.php?courseID='.$courseID.'">Enroll</a>
              </div>
            </div>
          </a>
        </div>
          ';
        }
      } 
      ?>
      <!-- end card -->
      
    </div>
    <div class="text-center m-2">
      <a href="course.php" class="btn btn-danger btn-sm">Veiw ALL Courses</a>
    </div>
  </div>
  <!-- end most popular course -->

  <!-- start contact us -->
  <?php
    include('./contact.php');
  ?>
  <!-- end contact us -->

  <!-- start student testimonial -->
  <div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
  <div class="row">
		<div class="col-md-8 col-center m-auto">
			<h2>Student's Feedback</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel -->
				<div class="carousel-inner">
        <?php
      $sql = "SELECT s.stuName, s.stuOcc, s.stuImg, f.fContent FROM student AS s JOIN feedback AS f ON s.stuId = f.stuId";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $active = "ok";
        while ($row = $result->fetch_assoc()) {
          echo '
          <div class="item carousel-item';
          if ($active == 'ok') {
            echo ' active ';
            $active = 'notok';
          }
          echo '">';
          echo'<div class="img-box"><img src="'.str_replace('..', '.', $row['stuImg']).'" alt=""></div>
          <p class="testimonial">'.$row['fContent'].'</p>
          <p class="overview"><b>'.$row['stuName'].'</b>, '.$row['stuOcc'].'</p>
          </div>
          ';
        }
      }
      ?>
				</div>
				<!-- Carousel Controls -->
				<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
  </div>
  <!-- end student testimonial -->

  <!-- start social follow -->
  <div class="contaier-fluid bg-danger">
    <div class="row text-white text-center p-2">
      <div class="col-sm">
        <a href="https://www.facebook.com/mehedihasan.sajjat.9/" class="text-white social-hover">
          <i class="fab fa-facebook-f"></i> Facebook
        </a>
      </div>
      <div class="col-sm">
        <a href="#" class="text-white social-hover">
          <i class="fab fa-twitter"></i> Twitter
        </a>
      </div>
      <div class="col-sm">
        <a href="#" class="text-white social-hover">
          <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
      </div>
      <div class="col-sm">
        <a href="#" class="text-white social-hover">
          <i class="fab fa-instagram"></i> Instagram
        </a>
      </div>
    </div>
  </div>
  <!-- start social follow -->

  <!-- start about section -->
  <div class="container-fluid p-4" style="background-color: #E9ECEF" id = "contact">
    <div class="container" style="background-color: #E9ECEF">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>Explore your passion at iSchool. Learn, lead and revolutionize education with us</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a href="#" class="text-dark">Web Development</a><br>
        <a href="#" class="text-dark">Web Designing</a><br>
        <a href="#" class="text-dark">Android App Dev</a><br>
        <a href="#" class="text-dark">iOS Development</a><br>
        <a href="#" class="text-dark">Data Analyst</a><br>
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>
          iSchool Pvt. Ltd <br>
          Near Polic Camp <br>
          Sakhiput, Tangail <br>
          Phone: +8801731-040473
        </p>
      </div>
    </div>
    </div>
  </div>
  <!-- end about section -->

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

  <!-- include footer -->
  <?php
  include('./mainInclude/footer.php');
  ?>
