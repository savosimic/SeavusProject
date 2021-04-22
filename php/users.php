<?php
    session_start();

    if(!isset($_SESSION['loggedIn'])) {
        header("Location: login-page.php");
    }
    
    include_once('includes/sidebar.php');
    include_once('includes/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Test project-Seavus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- page container area start -->
<div class="page-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="sales-report-area sales-style-two">
                <div class="row">
                      <h2 class="m-4 centered">List of users </h2>
                </div>
                <div class="row pt-5">
                  <button id="addUser" type="button" class="btn btn-labeled btn-sm btn-primary" style="margin:10" onclick="addUser(this)">
                      <span class="btn-label"><i class="ti-plus"></i></span>Add new user
                  </button>
                </div>
                <div class="row">

                  <?php
                      $data = getUsers();
                      foreach ($data as $key => $value) {
                  ?>
                          <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                              <div class="single-report">
                                  <div class="s-sale-inner pt--30 mb-3">
                                      <div class="s-report-title d-flex justify-content-between">
                                         <h3 class="header-title mb-0"> <?php echo $value['username'] ?></h3>
                                      </div>
                                      <!-- <img src="<?php echo $value['flag']; ?>" /> -->
                                  </div>

                                  <button id="editUser" type="button" class="btn btn-labeled btn-sm btn-warning" style="margin:10" onclick="editUser(this)">
                                      <span class="btn-label"><i class="ti-brush"></i></span> Edit
                                  </button>
                                  <button id="editUser" type="button" class="btn btn-labeled btn-sm btn-danger" style="margin:10" onclick="editUser(this)">
                                      <span class="btn-label"><i class="ti-eraser"></i></span> Delete
                                  </button>


                              </div>
                          </div>
                  <?php
                      }
                  ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>
