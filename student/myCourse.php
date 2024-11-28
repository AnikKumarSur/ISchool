<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
include './stuInclude/header.php';
include_once('../dbConnection.php');
if (isset($_SESSION['isLogin'])) {
  $stuLogEmail = $_SESSION['stuLogEmail'];
}
else {
  echo "<script> location.href='../index.php'; </script>";
}
?>
<!-- course start -->
<div class="col-sm-8 mt-5 ml-5">
<h1 class="text-center">All Courses</h1>
  <?php
    if (isset($stuLogEmail)) {
      $sql = "SELECT co.orderId, c.courseID, c.courseName, c.courseDuration, c.courseDesc, c.courseImg, c.courseAuthor, c.courseOriginalPrice, c.coursePrice FROM courseorder AS co JOIN course AS c ON c.courseID = co.courseID WHERE co.stuEmail = '$stuLogEmail'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
  ?>
        
          <div class="card mb-3 border-secondary">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="<?php echo $row['courseImg'] ?>" class="img-fluid rounded-start" alt="Picture">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['courseName'] ?></h5>
                  <p class="card-text"><?php echo $row['courseDesc'] ?></p>
                  <p class="card-text"><small class="text-muted">Duration: <?php echo $row['courseDuration'] ?> <br>Instructior: <?php echo $row['courseAuthor'] ?></small></p>
                  <p class="card-text d-inline">
                    Pirce: <small><del>&#2547; <?php echo $row['courseOriginalPrice'] ?></del> </small>
                    <span class="font-weight-border">&#2547; <?php echo $row['coursePrice'] ?></span>
                  </p>
                  <a class="btn btn-primary text-white font-weight-border float-right" href="watchCourse.php?courseID=<?php echo $row['courseID'] ?>">Watch Course</a>
                </div>
              </div>
            </div>
          </div>
          <?php
      }
    }
  }
?>
</div>
<!-- course end -->
<?php
include './stuInclude/footer.php';
?>