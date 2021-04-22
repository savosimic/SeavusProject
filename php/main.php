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
                      <h2 class="m-4 centered">List of countries </h2>
                </div>
                <div class="row">
                  <?php
                      initCountries();

                      $data = getData();
                      foreach ($data as $key => $value) {
                  ?>
                          <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                              <div class="single-report">
                                  <div class="s-sale-inner pt--30 mb-3">
                                      <div class="s-report-title d-flex justify-content-between">
                                         <h3 class="header-title mb-0"> <?php echo $value['name'] ?></h3>
                                      </div>
                                      <div style="width: 300px; height: 200px">
                                         <img src="<?php echo $value['flag']; ?>" style="max-width: 300px;padding-left: 0px; max-height: 200px"  />
                                      </div>
                                  </div>
                                  <p class="pl-0" data-region="<?php echo $value['region']?> "id="region" style="background-color:white"> Region: <?php echo $value['region']?></p>
                                  <p class="pl-0" data-population="<?php echo $value['population']?>" style="background-color:white"> Population: <?php echo $value['population']?></p>
                                  <button data-country-id="<?php echo $key; ?>" id="country" type="button" class="btn btn-labeled btn-sm btn-light pl-0" style="margin:10" onclick="addToFavorites(this)">
                                      <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Add to favorites
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


<script>
    function addToFavorites(element) {
        let region = element.parentNode.children[1].dataset['region'];
        let countryId = parseInt(element.parentNode.children[3].dataset['countryId']) + 1;
        let userId = "<?php echo $_SESSION['userId']; ?>";

        $.ajax({
  		      url: 'includes/api2.php?request=1',
  		      type: 'POST',
  		      data: JSON.stringify({user_id: userId, country_id: countryId, method: "POST"}),
            contentType: "application/json; charset=utf-8",
  		      cache: false,
  		   success: function(data) {
  		    	alert(data);
  		   }
  	   });
    }
</script>

</body>
</html>
