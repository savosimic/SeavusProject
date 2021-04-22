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
                    <div class="col-md-4 col-md-offset-4">
                      <form >
                        <div class="form-group">
                          <h2 class="m-4 centered">Country info</h2>
                          <label for="countryName">Get the specific information about country</label>
                          <input type="text" class="form-control" id="countryName" aria-describedby="countryName" placeholder="Enter country name">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="getCountryByName(this)">Find</button>
                      </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                        <div id="single-repor" class="single-report" style="display:none">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="s-report-title d-flex justify-content-between">
                                   <h3 class="header-title mb-0"> <?php echo $value['name'] ?></h3>
                                </div>
                                <img id="flag" src="" />
                            </div>
                            <p id="name" style="background-color:white"> </p>
                            <p id="capital" style="background-color:white"> </p>
                            <p id="population" style="background-color:white"> </p>
                        </div>
                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

    function getCountryByName(element) {
        let name = '';
        let flag = '';
        let capital = '';
        let population = '';
        let countryName = document.getElementById('countryName').value;
        if (countryName == '') {
           alert('You must enter name of the country!');
           return;
        }

        axios({
          method: 'get',
          url: 'https://restcountries.eu/rest/v2/name/'+countryName,
          responseType: 'stream'
        })
          .then(function (response) {
               let data =  response.data[0];
               name = data.name;
               capital = data.capital;
               population = data.population;
               flag = data.flag;

               document.getElementById('name').innerHTML="Name: " +name;
               document.getElementById('capital').innerHTML="Capital: " +capital;
               document.getElementById('population').innerHTML="Population: " +population;
               document.getElementById('flag').src=flag;
               document.getElementById('single-repor').style.display = 'block';
        })
          .catch(function (error) {
             document.getElementById('countryName').value = '';
             document.getElementById('single-repor').style.display = 'none';
             alert('No country found!');
          });
    }

</script>
</body>

</html>
