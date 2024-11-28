<!-- start footer -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">
      Copyright &copy; 2023 || Designed By E-Learning <?php if (!isset($_SESSION['isLogin'])) { echo' || <a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter">Admin Login</a>'; } ?>
    </small>
  </footer>
  <!-- end footer -->

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